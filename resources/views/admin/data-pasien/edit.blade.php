<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Data Pasien') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan isi form di bawah ini untuk memperbarui data pasien di dalam sistem.') }}
                            </p>

                        </header>

                        <form class="mt-6" action="{{ route('admin.data-pasien.update', $pasien->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3 form-group">
                                <label for="editNamaPasienInput">Nama</label>
                                <input type="text" class="rounded form-control" id="editNamaPasienInput"
                                    value="{{ old('nama') ?: $pasien->nama }}" name="nama">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editEmailInput">Email</label>
                                <input type="email" class="rounded form-control" id="editEmailInput"
                                    value="{{ old('email') ?: $pasien->email }}" name="email">
                            </div>

                            <!-- Password -->
                            <div class="mb-3 form-group">
                                <label for="password"">
                                    Password
                                </label>

                                <input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <label for="password_confirmation">
                                    Konfirmasi Password
                                </label>

                                <input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            
                            <div class="mb-3 form-group">
                                <label for="editAlamatInput">Alamat</label>
                                <input type="text" class="rounded form-control" id="editAlamatInput"
                                    value="{{ old('alamat') ?: $pasien->alamat }}" name="alamat">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editNoHpInput">No. HP</label>
                                <input type="text" class="rounded form-control" id="editNoHpInput"
                                    value="{{ old('no_hp') ?: $pasien->no_hp }}" name="no_hp">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="editNoKtpInput">No. KTP</label>
                                <input type="text" class="rounded form-control" id="editNoKtpInput"
                                    value="{{ old('no_ktp') ?: $pasien->no_ktp }}" name="no_ktp">
                            </div>

                            <a type="button" href="{{ route('admin.data-pasien.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
