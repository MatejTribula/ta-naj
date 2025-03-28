<x-action-section>
    <x-slot name="title">
        {{ __('Zmazať účet') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Natvrdo zmazať svoj účet.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Po zmazaní vášho účtu budú všetky jeho prostriedky a údaje natrvalo odstránené. Pred zmazaním účtu si prosím stiahnite všetky údaje alebo informácie, ktoré si chcete zachovať.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Zmazať účet') }}
            </x-danger-button>
        </div>

        <!-- Potvrdenie zmazania účtu -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Zmazať účet') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Ste si istý, že chcete zmazať svoj účet? Po zmazaní vášho účtu budú všetky jeho prostriedky a údaje natrvalo odstránené. Prosím zadajte svoje heslo pre potvrdenie, že chcete natrvalo zmazať svoj účet.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                        placeholder="{{ __('Heslo') }}" x-ref="password" wire:model="password"
                        wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Zrušiť') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Zmazať účet') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
