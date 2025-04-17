@extends('layouts.app')

@section('title', 'Edit Obat')
@section('content_header')
    <h1>Edit Obat</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('periksa.update', $periksa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa" placeholder="Tanggal Periksa" class="form-control"
                        value="{{ $periksa->tgl_periksa }}" required>
                </div>
                {{-- ambil template optionnya di adminLTE -> components -> basic form components --}}
                
                <div class="form-group">
                    <label for="biaya_periksa">Biaya</label>
                    <input type="number" name="biaya_periksa" id="biaya_periksa" placeholder="Biaya Periksa" class="form-control"
                    value="{{ $periksa->biaya_periksa }}" required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <input type="text" name="catatan" id="catatan" placeholder="Catatan Periksa" class="form-control"
                        value="{{ $periksa->catatan}}" required>
                </div>

                <div class="wrapper d-flex justify-content-end" style="gap: 10px;">
                    <button type="submit" class="btn btn-success">Ubah</button>
                    <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection