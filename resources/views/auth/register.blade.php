<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <span class="self-center text-xl font-semibold whitespace-nowrap">
                    <p class="inline-flex text-3xl">&mu;</p>niversity Report
                </span>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name Lastname')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" maxlength="100" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="id_cardcode" :value="__('ID Card Code')" />

                <x-input id="id_cardcode" class="block mt-1 w-full"
                                type="text" pattern="[0-9]{13}"
                                name="id_cardcode" required />
            </div>

            <div class="mt-4">
                <x-label for="phone_no" :value="__('Phone Number : Format 123-456-7890')" />

                <x-input id="phone_no" class="block mt-1 w-full"
                                type="tel"
                                name="phone_no" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <textarea id="address" class="block mt-1 w-full"
                                type="text"
                                name="address" required maxlength="200"></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
