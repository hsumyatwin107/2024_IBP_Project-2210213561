<x-guest-layout>
<style>
        body {
            background-color: #db1f26;
        }

        .centered-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 180vh;
        }

        .custom-card {
            background-color: rgba(200, 200, 200, 0.4);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0);
            border-radius: 20px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .custom-button {
            background-color: #990000;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #7a0000;
        }

        .auth-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        label, .text-white, .text-sm {
            color: white !important;
        }
    </style>
    <div class="centered-wrapper">
        <div class="custom-card">
            <div class="auth-logo">
                <img src="{{ asset('home/images/logo.png') }}" alt="Logo" class="h-16">
            </div>

            <x-validation-errors class="mb-4 text-white" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <!-- Father Name -->
<div class="mt-4">
    <x-label for="father_name" value="{{ __('Father Name') }}" />
    <x-input id="father_name" class="block mt-1 w-full" type="text" name="father_name" :value="old('father_name')" required autofocus autocomplete="father_name" />
</div>

<!-- Mother Name -->
<div class="mt-4">
    <x-label for="mother_name" value="{{ __('Mother Name') }}" />
    <x-input id="mother_name" class="block mt-1 w-full" type="text" name="mother_name" :value="old('mother_name')" required autocomplete="mother_name" />
</div>

<!-- Gender -->
<div class="mt-4">
    <x-label for="gender" value="{{ __('Gender') }}" />
    <select id="gender" name="gender" class="block mt-1 w-full" required>
        <option value="">{{ __('Select Gender') }}</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
    </select>
</div>

<!-- Date of Birth -->
<div class="mt-4">
    <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
</div>

<!-- Country of Birth -->
<div class="mt-4">
    <x-label for="country_of_birth" value="{{ __('Country of Birth') }}" />
    <x-input id="country_of_birth" class="block mt-1 w-full" type="text" name="country_of_birth" :value="old('country_of_birth')" required />
</div>

<!-- City of Birth -->
<div class="mt-4">
    <x-label for="city_of_birth" value="{{ __('City of Birth') }}" />
    <x-input id="city_of_birth" class="block mt-1 w-full" type="text" name="city_of_birth" :value="old('city_of_birth')" required />
</div>

<!-- Residence Permit Number -->
<div class="mt-4">
    <x-label for="residence_permit_number" value="{{ __('Residence Permit Number') }}" />
    <x-input id="residence_permit_number" class="block mt-1 w-full" type="text" name="residence_permit_number" :value="old('residence_permit_number')" required />
</div>

<!-- Passport Number -->
<div class="mt-4">
    <x-label for="passport_number" value="{{ __('Passport Number') }}" />
    <x-input id="passport_number" class="block mt-1 w-full" type="text" name="passport_number" :value="old('passport_number')" required />
</div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        </div>
   
    </div>
</x-guest-layout>
