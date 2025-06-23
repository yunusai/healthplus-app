<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Data Dokter') }}
                        </h2>
                        <div class="flex-col items-center justify-center text-center">
                            <a href="{{ route('admin.data-dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>

                            @if (session('status') === 'dokter-created')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >
                                    {{ __('Created.') }}
                                </p>
                            @endif
                        </div>
                    </header>

                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Poli</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">No. KTP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($dokters->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p class="text-gray-500 text">Tidak ada data dokter.</p>
                                    </td>
                                </tr>
                            @else
                            @foreach ($dokters as $dokter)
                                <tr>
                                    <th scope="row" class="align-middle text-start">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="align-middle text-start">
                                        {{ $dokter->nama }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ $dokter->poli->nama ?? 'Belum Punya Poli' }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ $dokter->email }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ $dokter->alamat }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ $dokter->no_hp }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ $dokter->no_ktp }}
                                    </td>
                                    <td class="flex items-center gap-3">
                                        {{-- Button Edit --}}
                                        <a href="{{ route('admin.data-dokter.edit', $dokter->id) }}" class="btn btn-secondary btn-sm">
                                            Edit
                                        </a>

                                        {{-- Button Delete --}}
                                        <form action="{{ route('admin.data-dokter.destroy', $dokter->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
