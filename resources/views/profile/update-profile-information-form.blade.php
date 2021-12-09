<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información de tu perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Acá podrás actualizar la información de tu perfil.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
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
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
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

        <!-- UserID -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="userId" value="{{ __('Identificación') }}" />
            <x-jet-input id="userId" type="text" class="mt-1 block w-full" wire:model.defer="state.userId"
                autocomplete="userId" />
            <x-jet-input-error for="userId" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Teléfono') }}" />
            <x-jet-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone"
                />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="location" value="{{ __('Ubicación') }}" />
            <x-jet-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="state.location" autocomplete="location" />
            <x-jet-input-error for="location" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthday" value="{{ __('Fecha de nacimiento') }}" />
            <x-jet-input id="birthday" type="date" class="mt-1 block w-full" wire:model.defer="state.birthday" autocomplete="birthday" />
            <x-jet-input-error for="birthday" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="status" value="{{ __('Estado') }}" />
            <select name="status" id="status" class="mt-1 block w-full">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('ACTUALIZADO.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Actualizar perfil') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
