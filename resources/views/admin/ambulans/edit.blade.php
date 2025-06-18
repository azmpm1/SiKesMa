<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
            <h2 class="text-2xl text-center font-bold text-gray-900">
                Edit Panggilan Ambulans
            </h2>

            <p class="mt-1 text-sm text-center text-gray-600 mb-8 border-b pb-6">
                Perbarui detail panggilan ambulans di bawah ini sesuai dengan informasi terbaru.
            </p>

            <form action="{{ route('admin.ambulans.update', $panggilanAmbulans->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="nama" :value="__('Nama Lengkap')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $panggilanAmbulans->nama)" required />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="no_telepon" :value="__('Nomor Telepon')" />
                    <x-text-input id="no_telepon" class="block mt-1 w-full" type="tel" name="no_telepon" :value="old('no_telepon', $panggilanAmbulans->no_telepon)" required />
                    <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="alamat" :value="__('Alamat Penjemputan')" />
                    <textarea id="alamat" name="alamat" rows="3" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('alamat', $panggilanAmbulans->alamat) }}</textarea>
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="keluhan_utama" :value="__('Keluhan Utama')" />
                    <textarea id="keluhan_utama" name="keluhan_utama" rows="3" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('keluhan_utama', $panggilanAmbulans->keluhan_utama) }}</textarea>
                    <x-input-error :messages="$errors->get('keluhan_utama')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit')" />
                    <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="3" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">{{ old('riwayat_penyakit', $panggilanAmbulans->riwayat_penyakit) }}</textarea>
                    <x-input-error :messages="$errors->get('riwayat_penyakit')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="tingkat_urgensi" :value="__('Tingkat Urgensi')" />
                    <select id="tingkat_urgensi" name="tingkat_urgensi" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>
                        <option value="tinggi" {{ old('tingkat_urgensi', $panggilanAmbulans->tingkat_urgensi) == 'tinggi' ? 'selected' : '' }}>Tinggi (Mengancam Nyawa)</option>
                        <option value="sedang" {{ old('tingkat_urgensi', $panggilanAmbulans->tingkat_urgensi) == 'sedang' ? 'selected' : '' }}>Sedang (Butuh Penanganan Cepat)</option>
                        <option value="rendah" {{ old('tingkat_urgensi', $panggilanAmbulans->tingkat_urgensi) == 'rendah' ? 'selected' : '' }}>Rendah (Stabil)</option>
                    </select>
                    <x-input-error :messages="$errors->get('tingkat_urgensi')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.ambulans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
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