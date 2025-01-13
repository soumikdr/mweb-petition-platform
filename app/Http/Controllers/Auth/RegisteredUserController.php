<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\BioID;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required', 'date', 'before:today'],
            'bioid' => ['required', 'string', 'max:255'],
        ]);

        $bioid = BioID::where('code', $request->bioid)->first();

        if ($bioid === null) {
            return back()->withErrors(['bioid' => 'Invalid BioID code.']);
        } elseif ($bioid->used) {
            return back()->withErrors(['bioid' => 'BioID code already used.']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'bio_ids_id' => $bioid->id,
        ]);

        $bioid->used = true;
        $bioid->save();

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
