<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Riwayat Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm-sm:p-8 sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Riwayat Pasien') }}
                        </h2>
                    </header>
{{-- Table --}}
<table class="table mt-6 overflow-hidden rounded table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">No. RM</th>
            <th scope="col">No.KTP</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periksas as $periksa)
            <tr>
                <th scope="row" class="align-middle text-start">{{ $loop->iteration }}</th>
                <td class="align-middle text-start">
                    {{ $periksa->janjiPeriksa->pasien->nama }}
                </td>
                <td class="align-middle text-start">
                    {{ $periksa->janjiPeriksa->pasien->no_rm }}
                </td>
                <td class="align-middle text-start">
                    {{ $periksa->janjiPeriksa->pasien->no_ktp }}
                </td>
                <td class="align-middle text-start">
                    {{ $periksa->janjiPeriksa->pasien->no_hp }}
                </td>
                <td class="align-middle text-start">
                    <a href="{{ route('dokter.riwayat-pasien.riwayat', $periksa->janjiPeriksa->id) }}" 
                       class="btn btn-secondary">
                       Riwayat
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
