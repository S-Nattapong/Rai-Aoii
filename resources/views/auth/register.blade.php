<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <span class="self-center text-xl font-semibold whitespace-nowrap">
                    <img src="{{ URL::to('/assets/logo_nav.png')}}" alt="" style="width: 100px">
                </span>
            </a>
        </x-slot>

        <!-- Validation Errors -->


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('ชื่อ-นามสกุล')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" maxlength="30" required autofocus placeholder="โชคดี มีชัย"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
            @if ($errors->has('email'))
                    <p class="text-red-600">
                    Email นี้ถูกใช้ไปแล้ว
                    </p>
                @endif
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" maxlength="30" required placeholder="user@example.com" />
            </div>

            <!-- Password -->
            <div class="mt-4">
            @if ($errors->has('password'))
                    <p class="text-red-600">
                    Password ไม่ตรงกับที่ Confirm Password
                    </p>
                @endif
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" minlength="8" maxlength="20" placeholder="8 ตัวอักษรขึ้นไป"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required minlength="8" maxlength="20" />
            </div>

            <div class="mt-4">
            @if ($errors->has('id_cardcode'))
                    <p class="text-red-600">
                    {{ $errors->first('id_cardcode') }}
                    </p>
                @endif
                <x-label for="id_cardcode" :value="__('รหัสบัตรประชาชน')" />

                <x-input id="id_cardcode" class="block mt-1 w-full"
                         type="text" pattern="[0-9]{13}" :value="old('id_cardcode')"
                         name="id_cardcode" required maxlength="14" placeholder="1234567890123"/>
            </div>

            <div class="mt-4">
                <x-label for="phone_no" :value="__('เบอร์โทรศัพท์')" />

                <x-input id="phone_no" class="block mt-1 w-full"
                         type="tel" :value="old('phone_no')"
                         name="phone_no" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="123-456-7890"/>
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('ที่อยู่')" />

                <textarea id="address" class="block mt-1 w-full"
                          type="text"
                          name="address" required maxlength="100">{{old('address')}}</textarea>
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
