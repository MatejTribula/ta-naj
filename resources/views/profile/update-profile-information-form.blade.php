<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informácie o profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Aktualizujte informácie o profile a e-mailovú adresu vášho účtu.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profilová fotografia -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Vstup pre súbor profilovej fotografie -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Fotografia') }}" />

                <!-- Aktuálna profilová fotografia -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                </div>

                <!-- Náhľad novej profilovej fotografie -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Vyberte novú fotografiu') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Odstrániť fotografiu') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif


        <!-- E-mail -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('E-mail') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Vaša e-mailová adresa nie je overená.') }}

                    <button type="button" wire:click.prevent="sendEmailVerification">
                        {{ __('Kliknite sem pre zaslanie overovacieho e-mailu.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Na vašu e-mailovú adresu bola odoslaná nová overovacia linka.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Uložené.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Uložiť') }}
        </x-button>
    </x-slot>
</x-form-section>
