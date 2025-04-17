<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;


class ObatController extends Controller
{
    //
    public function index()
    {
        $obat = Obat::all();
        return view('dokter.obat.index', compact('obat'));
    }
    public function create()
    {
        return view('dokter.obat.create');
    }

    public function edit(Obat $obat)
    {
        return view('dokter.obat.edit', compact('obat'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required',
        ]);

        Obat::create($request->all());
        return redirect()->route('obat.index');
    }
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required'
        ]);

        $obat->update($request->all());
        return redirect()->route('obat.index');
    }
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index');
    }
}
