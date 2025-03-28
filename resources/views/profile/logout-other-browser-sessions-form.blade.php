<x-action-section>
    <x-slot name="title">
        {{ __('Relácie prehliadača') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Spravujte a odhláste sa z aktívnych relácií na iných prehliadačoch a zariadeniach.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Ak je to potrebné, môžete sa odhlásiť zo všetkých ostatných relácií prehliadača na všetkých svojich zariadeniach. Niektoré z vašich nedávnych relácií sú uvedené nižšie; však táto zoznam nemusí byť úplný. Ak máte pocit, že sa váš účet dostal do neoprávnenej správy, mali by ste tiež aktualizovať svoje heslo.') }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Ostatné relácie prehliadača -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Neznámy') }} -
                                {{ $session->agent->browser() ? $session->agent->browser() : __('Neznámy') }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('Toto zariadenie') }}</span>
                                    @else
                                        {{ __('Posledná aktivita') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Odhlásiť zo všetkých relácií prehliadača') }}
            </x-button>

            <x-action-message class="ms-3" on="loggedOut">
                {{ __('Hotovo.') }}
            </x-action-message>
        </div>

        <!-- Potvrdenie odhlásenia z ostatných zariadení -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __('Odhlásiť zo všetkých relácií prehliadača') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Prosím zadajte svoje heslo pre potvrdenie, že sa chcete odhlásiť z ostatných relácií prehliadača na všetkých vašich zariadeniach.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                        placeholder="{{ __('Heslo') }}" x-ref="password" wire:model="password"
                        wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Zrušiť') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    {{ __('Odhlásiť zo všetkých relácií prehliadača') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
