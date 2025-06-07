<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- User Type -->
        <div>
            <x-input-label for="user_type" :value="__('Register as')" />
            <select id="user_type" name="user_type" class="block mt-1 w-full" required>
                <option value="">-- Select --</option>
                <option value="job_seeker" {{ old('user_type') == 'job_seeker' ? 'selected' : '' }}>Job Seeker</option>
                <option value="employer" {{ old('user_type') == 'employer' ? 'selected' : '' }}>Employer</option>
            </select>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- No KTP -->
        <div class="mt-4">
            <x-input-label for="no_ktp" :value="__('No KTP')" />
            <x-text-input id="no_ktp" class="block mt-1 w-full" type="text" name="no_ktp" :value="old('no_ktp')" required />
            <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- No Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telepon" :value="__('No Telepon')" />
            <x-text-input id="no_telepon" class="block mt-1 w-full" type="text" name="no_telepon" :value="old('no_telepon')" required />
            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-red-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
