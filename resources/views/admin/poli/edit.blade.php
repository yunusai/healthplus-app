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
                                {{ __('Edit Data Poli') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan perbarui informasi poli sesuai dengan nama dan deskripsi terbaru.') }}
                            </p>

                        </header>

                        <form class="mt-6" action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 form-group">
                                <label for="editNamaObatInput">Nama</label>
                                <input type="text" class="rounded form-control" id="editNamaObatInput"
                                    value="{{ $poli->nama }}" name="nama">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editKemasanInput">Deskripsi</label>
                                <input type="text" class="rounded form-control" id="editKemasanInput"
                                    value="{{ $poli->deskripsi }}" name="deskripsi">
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <a type="button" href="{{ route('admin.poli.index') }}" class="btn btn-secondary">
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
