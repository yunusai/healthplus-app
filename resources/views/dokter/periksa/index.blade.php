@extends('layouts.app')
 
{{-- Customize layout sections --}}
 
@section('subtitle', 'Dokter')
@section('content_header_title', 'Periksa')
@section('content_body')
    <div class="card">
        <div class="card-header">Jadwal Periksa</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periksa as $o)
                        <tr>
                            <td>{{ $o->id }}</td>
                            <td>{{ $o->pasien->nama  }}</td>
                            <td>{{ $o->tgl_periksa }}</td>
                            <td>
                                <a href="{{ route('periksa.edit', $o->id)}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection