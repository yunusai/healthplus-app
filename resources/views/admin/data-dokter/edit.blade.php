<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Data Dokter') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan perbarui informasi dokter sesuai dengan nama, poli, dan email terbaru.') }}
                            </p>

                        </header>

                        <form class="mt-6" action="{{ route('admin.data-dokter.update', $dokter->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 form-group">
                                <label for="editNamaDokterInput">Nama</label>
                                <input type="text" class="rounded form-control" id="editNamaDokterInput"
                                    value="{{ $dokter->nama }}" name="nama">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="id_poli">Poli</label>
                                <select id="id_poli" name="id_poli" class="rounded form-control">
                                    <option value="">Belum Punya Poli</option>
                                    @foreach ($polis as $poli)
                                        <option value="{{ $poli->id }}" {{ old('id_poli', $dokter->id_poli) == $poli->id ? 'selected' : '' }}>{{ $poli->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editEmailInput">Email</label>
                                <input type="email" class="rounded form-control" id="editEmailInput"
                                    value="{{ $dokter->email }}" name="email">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editPasswordInput">Password</label>
                                <input type="password" class="rounded form-control" id="editPasswordInput"
                                    name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editAlamatInput">Alamat</label>
                                <input type="text" class="rounded form-control" id="editAlamatInput"
                                    value="{{ $dokter->alamat }}" name="alamat">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editNoHpInput">No. HP</label>
                                <input type="text" class="rounded form-control" id="editNoHpInput"
                                    value="{{ $dokter->no_hp }}" name="no_hp">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editNoKtpInput">No. KTP</label>
                                <input type="text" class="rounded form-control" id="editNoKtpInput"
                                    value="{{ $dokter->no_ktp }}" name="no_ktp">
                            </div>

                            <a type="button" href="{{ route('admin.data-dokter.index') }}" class="btn btn-secondary">
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
