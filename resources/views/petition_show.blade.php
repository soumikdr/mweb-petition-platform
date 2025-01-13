<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Petition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 uppercase font-bold">
                    {{ __("Petition") }}
                </div>

                <hr class="h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" style="margin-top: 15px !important; margin-bottom: 15px !important;"/>

                <p class="font-bold">Title: </p>
                <p class="font-medium">{{ $petition->title }}</p>

                <p class="font-bold pt-4">Created By: </p>
                <p class="font-medium">{{ $creator->name }}</p>

                <p class="font-bold pt-4">Status: </p>
                <p class="font-medium">{{ $petition->status }}</p>

                <p class="font-bold pt-4">Content: </p>
                <p class="font-medium">{{ $petition->content ?? "Not Available" }}</p>

                @if($authUserType === 'OFFICER')
                    <p class="font-bold pt-4">Signature Threshold: </p>
                    <p class="font-medium">{{ $thresholdSetting->value }}</p>
                @endif

                <p class="font-bold pt-4">Signature: </p>
                <div class="flex justify-evenly items-center">
                    @if($creator->id == $petition->petitioner_id && $authUserType === 'PETITIONER')
                        <p class="font-medium">You have created this petition, only others can sign it</p>
                    @endif

                    @if($authUserType === 'OFFICER')
                        <p class="font-medium">Signed By {{ $petition->signature_count }} {{ Str::plural('petitioner', $petition->signature_count) }}!</p>
                    @endif

                    @if(!$userAlreadySigned && !$selfPetition && $petition->status == 'open' && $authUserType === 'PETITIONER')
                        <button class="bg-purple-500 text-white rounded-md px-8 py-2 text-base font-medium hover:bg-blue-600
                        focus:outline-none focus:ring-2 focus:ring-green-300" id="open-btn">
                            Sign
                        </button>
                    @endif

                    @if($userAlreadySigned && $authUserType === 'PETITIONER')
                        <p class="font-medium">You have already signed this petition</p>
                    @endif
                </div>

                <p class="font-bold pt-4">Response: </p>
                <p class="font-medium">{{ $petition->response ?? "Not Available" }}</p>
                <div class="flex justify-end items-center">
                    @if($authUserType === 'OFFICER')
                        <button class="bg-purple-500 text-white rounded-md px-8 py-2 text-base font-medium hover:bg-blue-600
                        focus:outline-none focus:ring-2 focus:ring-green-300" id="open-btn2">
                            Add Response
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!---Modal -->
    <div class="fixed hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
    bg-white rounded-lg shadow dark:bg-gray-700" id="modal">
        <div class="relative p-5 w-100 shadow-lg rounded-md bg-blue-300 dark:bg-blue-800">
            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('petitions.sign', ['petition' => $petition->id]) }}">
                    @csrf
            
                    <div>
                        <x-input-label for="sign" :value="__('Sign here:')" />
                        <x-text-input id="sign" class="block mt-1 w-full" type="text" name="sign" required />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">            
                        <x-primary-button class="ms-4">
                            {{ "Sign" }}
                        </x-primary-button>

                        <x-secondary-button id="cancel-btn" class="ms-4">Cancel</x-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---Modal Response -->
    <div class="fixed hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
    bg-white rounded-lg shadow dark:bg-gray-700" id="modal2">
        <div class="relative p-5 w-100 shadow-lg rounded-md bg-blue-300 dark:bg-blue-800" style="padding: 40px;">
            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('petitions.response', ['petition' => $petition->id]) }}">
                    @csrf
            
                    <div>
                        <x-input-label for="response" :value="__('Add response here:')" />
                        <x-text-input id="response" class="block mt-1 w-full" type="text" name="response" required />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">            
                        <x-primary-button class="ms-4">
                            {{ "Add" }}
                        </x-primary-button>

                        <x-secondary-button id="cancel-btn2" class="ms-4">Cancel</x-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let modal = document.getElementById('modal');
            let btn = document.getElementById('open-btn');
            let cancel = document.getElementById('cancel-btn');
            
            let modal2 = document.getElementById('modal2');
            let btn2 = document.getElementById('open-btn2');
            let cancel2 = document.getElementById('cancel-btn2');
    
            // Sign
            if (btn) {
                btn.onclick = function() {
                    modal.style.display = 'block';
                };
            }
    
            cancel.onclick = function() {
                modal.style.display = 'none';
            };
    
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
    
            // Response
            if (btn2) {
                btn2.onclick = function() {
                    console.log('clicked');
                    modal2.style.display = 'block';
                };
            }
    
            cancel2.onclick = function() {
                modal2.style.display = 'none';
            };
    
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal2.style.display = "none";
                }
            }
        });

    </script>

</x-app-layout>