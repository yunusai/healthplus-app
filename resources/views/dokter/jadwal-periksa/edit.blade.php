<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Data Jadwal Periksa') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan perbarui informasi jadwal periksa sesuai dengan hari, jam mulai, dan jam selesai terbaru.') }}
                            </p>

                        </header>

                        <form class="mt-6" action="{{ route('dokter.jadwal-periksa.change', $jadwalPeriksa->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 form-group">
                                <label for="editHari">Hari</label>
                                <select class="rounded form-control" id="editHari" name="hari" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin" {{ $jadwalPeriksa->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ $jadwalPeriksa->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ $jadwalPeriksa->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ $jadwalPeriksa->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ $jadwalPeriksa->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ $jadwalPeriksa->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ $jadwalPeriksa->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editJamMulai">Jam Mulai</label>
                                <input type="time" class="rounded form-control" id="editJamMulai"
                                    value="{{ \Carbon\Carbon::parse( $jadwalPeriksa->jam_mulai)->format('H:i') }}" name="jam_mulai"  required>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editJamSelesai">Jam Selesai</label>
                                <input type="time" class="rounded form-control" id="editJamSelesai"
                                    value="{{ \Carbon\Carbon::parse( $jadwalPeriksa->jam_selesai)->format('H:i') }}" name="jam_selesai" required>
                            </div>

                            <a type="button" href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>