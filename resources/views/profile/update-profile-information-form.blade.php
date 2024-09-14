<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Mi perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu perfil.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecciona una nueva foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Eliminar foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

        <!-- Número de área -->
        <div class="col-span-6 sm:col-span-4 py-4">
            <x-jet-label for="name" value="{{ __('Área') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="3" readonly/>
        </div>

        <!-- Área -->
        <div class="col-span-6 sm:col-span-4 py-2">
            <x-jet-label for="name" value="{{ __('Nombre del área') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="ECONÓMICO ADMINISTRATIVO" readonly/>
        </div>

        <!-- Número de dependencia -->
        <div class="col-span-6 sm:col-span-4 py-3">
            <x-jet-label for="name" value="{{ __('Número de Dependencia') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{$numeroDependencia = DB::table('users')->select('dependencia')->where('dependencia','=',Auth::user()->dependencia)->value('dependencia');}}" readonly/>
        </div>

        <!-- Dependencia -->
        <div class="col-span-6 sm:col-span-4 py-3">
            <x-jet-label for="name" value="{{ __('Dependencia') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{$nombreDependencia = DB::table('zona__dependencias')->select('nombre_dependencia')->where('clave_dependencia','=',Auth::user()->dependencia)->value('nombre_dependencia');}}" readonly/>
        </div>

        <!-- Número de zona -->
        <div class="col-span-6 sm:col-span-4 py-3">
            <x-jet-label for="name" value="{{ __('Número de zona') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{$numeroZona = DB::table('users')->select('zona')->where('zona','=',Auth::user()->zona)->value('zona');}}" readonly/>
        </div>

        <!-- Zona -->
        <div class="col-span-6 sm:col-span-4 py-3">
            <x-jet-label for="name" value="{{ __('Zona') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{$nombreZona = DB::table('zonas')->select('nombre')->where('id','=',Auth::user()->zona)->value('nombre');}}" readonly/>
        </div>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Su email no está verificado') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click aquí para reenviar el email de verificación.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('El enlace de verificación ha sido enviado a tu email.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Cambios guardados.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
