<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-3xl">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold text-center">Formulir Panggilan Ambulans</h2>
                    <p class="text-center mt-1 text-gray-600 mb-8 border-b pb-6">Mohon isi data dengan benar untuk penanganan yang cepat dan
                        tepat.</p>

                    <form action="{{ route('ambulans.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="nama" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                :value="old('nama', auth()->user()->name)" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="no_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="no_telepon" class="block mt-1 w-full" type="tel" name="no_telepon"
                                :value="old('no_telepon', auth()->user()->no_telp)" required />
                            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="alamat" :value="__('Alamat Lengkap Penjemputan')" />
                            <textarea id="alamat" name="alamat" rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('alamat', auth()->user()->alamat) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="keluhan_utama" :value="__('Keluhan Utama Pasien')" />
                            <textarea id="keluhan_utama" name="keluhan_utama" rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('keluhan_utama') }}</textarea>
                            <x-input-error :messages="$errors->get('keluhan_utama')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit (jika ada)')" />
                            <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('riwayat_penyakit') }}</textarea>
                            <x-input-error :messages="$errors->get('riwayat_penyakit')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tingkat_urgensi" :value="__('Tingkat Urgensi')" />
                            <select id="tingkat_urgensi" name="tingkat_urgensi"
                                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                                required>
                                <option value="" disabled selected>Pilih Tingkat Urgensi</option>
                                <option value="tinggi" @if (old('tingkat_urgensi') == 'tinggi') selected @endif>Tinggi
                                    (Mengancam Nyawa)</option>
                                <option value="sedang" @if (old('tingkat_urgensi') == 'sedang') selected @endif>Sedang (Butuh
                                    Penanganan Cepat)</option>
                                <option value="rendah" @if (old('tingkat_urgensi') == 'rendah') selected @endif>Rendah (Stabil)
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('tingkat_urgensi')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button
                                class="w-full justify-center text-lg py-3 bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:ring-red-500">
                                {{ __('Kirim Panggilan Darurat') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
