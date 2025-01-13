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
                    {{ __("Petitions Threshold") }}
                </div>
                
                <hr class="my-6 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />

                <form method="POST" action="{{ route('petitions.threshold-submit') }}">
                    @csrf
                    <div class="mx-6 mb-4">
                        <p class="font-bold">Current Petition Threshold: </p>
                        <p class="font-medium">{{ $thresholdSetting->value }}</p>
        
                        <div class="mt-6">
                            <x-input-label for="threshold" :value="__('New Signature Threshold')" />
                            <x-text-input id="threshold" class="block mt-1 w-full" type="number" name="threshold" min="1" :value="old('threshold')" required autofocus />
                            <x-input-error :messages="$errors->get('threshold')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="mx-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>