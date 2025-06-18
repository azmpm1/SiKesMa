<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
            <h2 class="text-2xl text-center font-bold text-gray-900">Edit Data Pengguna</h2>
            <p class="mt-1 text-sm text-center text-gray-600 mb-8 border-b pb-6">Perbarui detail pengguna di bawah ini.</p>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $user->name)" required />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $user->email)" required />
                    </div>
                    <div>
                        <x-input-label for="nik" :value="__('NIK')" />
                        <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik"
                            :value="old('nik', $user->nik)" />
                    </div>
                    <div>
                        <x-input-label for="no_telp" :value="__('No. Telepon')" />
                        <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp"
                            :value="old('no_telp', $user->no_telp)" />
                    </div>
                    <div>
                        <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                            :value="old('tanggal_lahir', $user->tanggal_lahir)" />
                    </div>
                    <div>
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <textarea id="alamat" name="alamat" rows="3"
                        class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t mt-6">
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">Batal</a>
                    <x-primary-button>{{ __('Update Pengguna') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
