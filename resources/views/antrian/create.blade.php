<x-app-layout :title="__('Ambil Antrian')">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-center mb-4">Ambil Antrian</h2>
                    <p class="text-center text-gray-600 mb-8">Daftar antrian pemeriksaan di puskesmas secara online tanpa perlu datang lebih awal.</p>
                    
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('antrian.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required />
                            </div>

                            <div>
                                <x-input-label :value="__('Poli')" />
                                <div class="mt-2 space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="poli" value="Umum" class="text-green-600 form-radio" required>
                                        <span class="ml-2">Umum</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="poli" value="Gigi" class="text-green-600 form-radio">
                                        <span class="ml-2">Gigi</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="poli" value="Anak" class="text-green-600 form-radio">
                                        <span class="ml-2">Anak</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <x-input-label for="keluhan" :value="__('Keluhan')" />
                                <textarea id="keluhan" name="keluhan" rows="3" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ old('keluhan') }}</textarea>
                            </div>

                            <div>
                                <x-input-label for="tanggal_periksa" :value="__('Tanggal Periksa')" />
                                <x-text-input id="tanggal_periksa" class="block mt-1 w-full" type="date" name="tanggal_periksa" :value="old('tanggal_periksa')" required />
                            </div>

                            <div>
                                <x-input-label :value="__('Metode Pembayaran')" />
                                <div class="mt-2 space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="metode_pembayaran" value="Umum" class="text-green-600 form-radio" required>
                                        <span class="ml-2">Umum</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="metode_pembayaran" value="BPJS" class="text-green-600 form-radio">
                                        <span class="ml-2">BPJS</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <x-primary-button class="w-full justify-center bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:ring-green-500">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>