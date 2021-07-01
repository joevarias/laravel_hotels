<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div>
            <h1 class="text-center m-2 font-semibold">Employee Registration</h1>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('employee.register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Last name -->

            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>


            <!-- Username -->
            <div class="mt-4">
                <x-label for="employee_username" :value="__('Username')" />

                <x-input id="employee_username" class="block mt-1 w-full {{$errors->has('employee_username') ? ' is-invalid' : ''}}" type="text" name="employee_username" :value="old('employee_username')" required/>

                @if ($errors->has('employee_username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('employee_username') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Date of Birth -->

            <div class="mt-4">
                <x-label for="date_of_birth" :value="__('Date of Birth')" />

                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            </div>


            <!-- Address -->

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('employee.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
