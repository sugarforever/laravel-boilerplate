<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-primary-button class="ml-3" id="metamask-login" 
            data-signature-url="{{ route('metamask.signature') }}"
            data-authenticate-url="{{ route('metamask.authenticate') }}"
            data-redirect-url="{{ route('dashboard') }}">
            {{ __('Login with MetaMask') }}
        </x-primary-button>
    </x-auth-card>
</x-guest-layout>
