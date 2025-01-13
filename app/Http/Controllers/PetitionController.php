<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Models\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::all();

        return view('petitions', compact('petitions'));
    }

    public function create()
    {
        if (auth()->user()->user_type !== 'PETITIONER') {
            return redirect()->route('petitions.index');
        }

        return view('petition_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        Petition::create([
            'title' => $request->title,
            'content' => $request->content,
            'petitioner_id' => auth()->id(),
            'status' => 'open',
        ]);

        return redirect()->route('petitions.index');
    }

    public function show(Petition $petition)
    {
        $signatories = $petition->signatories ?? [];
        $userAlreadySigned = in_array(auth()->id(), $signatories, true);
        $selfPetition = $petition->petitioner_id === auth()->id();

        $creator = User::find($petition->petitioner_id);
        $thresholdSetting = Setting::where('key', 'signature_threshold')->first();
        $authUserType = auth()->user()->user_type;

        return view('petition_show', compact('petition', 'userAlreadySigned', 'selfPetition', 'creator', 'thresholdSetting', 'authUserType'));
    }

    public function sign(Petition $petition)
    {
        $signatories = $petition->signatories ?? [];
        $userAlreadySigned = in_array(auth()->id(), $signatories, true);

        if ($userAlreadySigned) {
            return back()->withErrors(['sign' => "You've already signed this petition."]);
        }

        $petition->signatories = array_merge($petition->signatories ?? [], [auth()->id()]);
        $petition->signature_count = $petition->signature_count + 1;
        $petition->save();

        return redirect()->route('petitions.show', $petition);
    }

    public function response(Request $request, Petition $petition)
    {
        if (auth()->user()->user_type !== 'OFFICER') {
            return redirect()->route('petitions.show', $petition);
        }

        $request->validate([
            'response' => 'required|string|max:10000',
        ]);

        $petition->response = $request->response;
        $petition->status = 'closed';
        $petition->save();

        return redirect()->route('petitions.show', $petition);
    }

    public function threshold()
    {
        if (auth()->user()->user_type !== 'OFFICER') {
            return redirect()->route('petitions.index');
        }

        $thresholdSetting = Setting::where('key', 'signature_threshold')->first();

        return view('petition_threshold', compact('thresholdSetting'));
    }

    public function thresholdSubmit(Request $request)
    {
        if (auth()->user()->user_type !== 'OFFICER') {
            return redirect()->route('petitions.index');
        }

        $request->validate([
            'threshold' => 'required|integer|min:1',
        ]);

        $thresholdSetting = Setting::where('key', 'signature_threshold')->first();
        $thresholdSetting->value = $request->threshold;
        $thresholdSetting->save();

        return redirect()->route('petitions.index');
    }

    public function apiPetitions(Request $request)
    {
        $petitions = Petition::all();
        $status = $request->query('status');

        // dd($status);
        if ($status !== null) {
            $petitions = $petitions->where('status', $status);
        }

        $petitions = $petitions->map(function ($petition) {
            return [
                'petition_id' => $petition->id,
                'status' => $petition->status,
                'petition_title' => $petition->title,
                'petition_text' => $petition->content,
                'petitioner' => $petition->petitioner_id,
                'signatures' => $petition->signature_count,
                'response' => $petition->response,
            ];
        });

        return response()->json([
            'petitions' => $petitions,
        ]);
    }
}
