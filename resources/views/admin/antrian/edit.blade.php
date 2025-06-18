<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">

        {{-- Judul halaman yang sebelumnya di sini, sekarang dipindahkan ke dalam form --}}

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
            <h2 class="text-2xl text-center font-bold text-gray-900">
                Edit Data Antrian
            </h2>

            <p class="text-center mt-1 text-sm text-gray-600 mb-8 border-b pb-6">
                Perbarui detail antrian di bawah ini dan pastikan data yang dimasukkan sudah benar.
            </p>

            <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="nik" :value="__('NIK')" />
                    <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', $antrian->nik)" required />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                <div>
                    <x-input-label :value="__('Poli')" />
                    <div class="mt-2 flex space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="poli" value="Umum" class="form-radio text-green-600" {{ old('poli', $antrian->poli) == 'Umum' ? 'checked' : '' }}>
                            <span class="ml-2">Umum</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="poli" value="Gigi" class="form-radio text-green-600" {{ old('poli', $antrian->poli) == 'Gigi' ? 'checked' : '' }}>
                            <span class="ml-2">Gigi</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="poli" value="Anak" class="form-radio text-green-600" {{ old('poli', $antrian->poli) == 'Anak' ? 'checked' : '' }}>
                            <span class="ml-2">Anak</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('poli')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="keluhan" :value="__('Keluhan')" />
                    <textarea id="keluhan" name="keluhan" rows="4" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('keluhan', $antrian->keluhan) }}</textarea>
                    <x-input-error :messages="$errors->get('keluhan')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="tanggal_periksa" :value="__('Tanggal Periksa')" />
                    <x-text-input id="tanggal_periksa" class="block mt-1 w-full" type="date" name="tanggal_periksa" :value="old('tanggal_periksa', $antrian->tanggal_periksa)" required />
                    <x-input-error :messages="$errors->get('tanggal_periksa')" class="mt-2" />
                </div>

                <div>
                    <x-input-label :value="__('Metode Pembayaran')" />
                    <div class="mt-2 flex space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="metode_pembayaran" value="Umum" class="form-radio text-green-600" {{ old('metode_pembayaran', $antrian->metode_pembayaran) == 'Umum' ? 'checked' : '' }}>
                            <span class="ml-2">Umum</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="metode_pembayaran" value="BPJS" class="form-radio text-green-600" {{ old('metode_pembayaran', $antrian->metode_pembayaran) == 'BPJS' ? 'checked' : '' }}>
                            <span class="ml-2">BPJS</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('metode_pembayaran')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.antrian.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
                        Batal
                    </a>
                    <x-primary-button>
                        {{ __('Update Data') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>