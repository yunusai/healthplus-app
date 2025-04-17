@extends('layouts.app')
 
{{-- Customize layout sections --}}
 
@section('subtitle', 'Dokter')
@section('content_header_title', 'Obat')
@section('content_body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('obat.create') }}" class="btn
btn-primary">Tambah Obat</a>
        </div>
 
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat as $o)
                        <tr>
                            <td>{{ $o->id }}</td>
                            <td>{{ $o->nama_obat }}</td>
                            <td>{{ $o->kemasan }}</td>
                            <td>{{ $o->harga }}</td>
                             <td>
                                <a href="{{ route('obat.edit', $o->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('obat.destroy', $o->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection