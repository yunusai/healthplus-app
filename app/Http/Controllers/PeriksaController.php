<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    //
    public function index()
    {
        // if (auth()->user()->role === 'dokter') {
        $periksa = Periksa::all();
        return view('dokter.periksa.index', compact('periksa'));

        // if (auth()->user()->role === 'pasien') {
        //     return view('pasien.periksa.index');
        // } else {
        //     return view('pasien.periksa.index');
        // }

    }
    public function create()
    {
        $dokters = User::where('role', 'dokter')->pluck('nama', 'id')->toArray();
        return view('pasien.periksa.create', compact('dokters'));
    }

    public function edit(Periksa $periksa)
    {
        return view('dokter.periksa.edit', compact('periksa'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required',
            'tgl_periksa' => 'required',
        ]);

        Periksa::create(
            [
                'id_dokter' => $request->id_dokter,
                'id_pasien' => Auth::user()->id,
                'tgl_periksa' => $request->tgl_periksa,
            ]
        );
        return redirect()->route('periksa.index');
    }
    public function update(Request $request, Periksa $periksa)
    {
        $request->validate([
            'tgl_periksa' => 'required',
            'catatan' => 'required',
            'biaya_periksa' => 'required',
        ]);

        $periksa->update($request->all());
        return redirect()->route('periksa.index');
    }
}
