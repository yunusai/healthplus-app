<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Poli') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tambah Data Poli') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan isi form di bawah ini untuk menambahkan data poli ke dalam sistem.') }}
                            </p>
                        </header>

                        <form class="mt-6" id="formPoli" action="{{ route('admin.poli.store') }}" method="POST">
                            @csrf

                            {{-- Nama Poli --}}
                            <div class="mb-3 form-group">
                                <label for="nama">Nama Poli</label>
                                <input
                                    type="text"
                                    class="rounded form-control"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                >
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3 form-group">
                                <label for="kemasan">Deskripsi</label>
                                <input
                                    type="text"
                                    class="rounded form-control"
                                    id="deskripsi"
                                    name="deskripsi"
                                    value="{{ old('deskripsi') }}"
                                >
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-4 mt-4">
                                <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
