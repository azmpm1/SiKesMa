<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Daftar</h2>

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="grid md:grid-cols-2 md:gap-6 mt-4">
            <div>
                <x-input-label for="nik" :value="__('NIK')" />
                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6 mt-4">
            <div>
                <x-input-label :value="__('Jenis Kelamin')" />
                <div class="flex items-center space-x-6 mt-3">
                    <label for="laki-laki" class="flex items-center">
                        <input id="laki-laki" type="radio" name="jenis_kelamin" value="Laki-laki" class="rounded-lg border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                        <span class="ms-2 text-2sm text-gray-600">{{ __('Laki-laki') }}</span>
                    </label>
                    <label for="perempuan" class="flex items-center">
                        <input id="perempuan" type="radio" name="jenis_kelamin" value="Perempuan" class="rounded-lg border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                        <span class="ms-2 text-2sm text-gray-600">{{ __('Perempuan') }}</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="no_telp" :value="__('No. Telepon')" />
                <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required />
                <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm resize-none" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-3sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4 text-3sm bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:ring-green-500">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>