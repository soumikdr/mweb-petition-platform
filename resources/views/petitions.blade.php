<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Petitions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 uppercase font-bold">
                    {{ __("Petitions") }}
                </div>

                <div class="flex justify-end">
                    @if(auth()->user()->user_type == 'PETITIONER')
                        <x-primary-button class="me-10">
                            <a href="{{ route('petitions.create') }}">New Petition</a>
                        </x-primary-button>
                    @endif
                </div>
                
                <hr class="my-6 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />

                <table class="table-auto w-11/12 text-left mx-6 mb-4 overflow-hidden">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($petitions as $petition)
                            <tr class="py-4">
                                <td class="px-4 py-2 font-medium">{{ $petition->title }}</td>
                                <td class="px-4 py-2 font-medium">{{ $petition->status }}</td>
                                <td class="px-4 py-2 font-medium">
                                    <a href="{{ route('petitions.show', $petition->id) }}" class="text-blue-500">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-2" colspan="3">No petitions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>