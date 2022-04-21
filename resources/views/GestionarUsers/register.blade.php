<x-app-layout>
<div class="w-full md:flex md:justify-center my-4 md:px-4 ">
    <div class="bg-white md:w-3/6 md:p-10 p-4 my-2 md:mx-10 md:my-5  rounded-md">
            <x-jet-validation-errors class="mb-4 text-red-600"/>
            <svg xmlns="http://www.w3.org/2000/svg" height="44px" viewBox="0 0 24 24" width="44px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
            <h2 class="text-2xl font-bold">Registrar usuario:</h2>
            <br>
            <form method="POST"  action="{{ route('G-userCreate.store') }}">
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Apellido') }}" />
                    <x-jet-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('name')"  autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('RH') }}" />
                    <x-jet-input id="apellido" class="block mt-1 w-full" type="text" name="rh" :value="old('name')"  autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="number" name="cedula"  autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Contingente') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="text" name="contingente" autocomplete="new-password" />
                </div>

                <div class="my-4 flex justify-center">
                    <select name="compañia" class="cursor-pointer 'border-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md">
                        <option value="">¡Seleccionar una compañia!</option>
                        <option value="11">Marly</option>
                        <option value="12">Consuelo</option>
                        <option value="13">Pradera</option>
                        <option value="14">Socorro</option>
                        <option value="15">Ricaurte</option>
                    </select>
                </div>

                <div class="my-4 flex justify-center">
                    <select name="rango" class="cursor-pointer 'border-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md">
                        <option value="">¡Seleccionar un rango!</option>
                        <option value="soldado">Soldado</option>
                        <option value="sub-oficial">Sub-oficial</option>
                        <option value="oficial">Oficial</option>
                    </select>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4 bg-gray-800">
                        {{ __('Registrar') }}
                    </x-jet-button>
                </div>
            </form>
    </div>   
</div>     
</x-app-layout>
