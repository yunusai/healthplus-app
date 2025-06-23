<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokterController extends Controller
{
    //
    public function index()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('admin.data-dokter.index')->with('dokters', $dokters);
    }
    public function create()
    {
        $polis = Poli::all();
        return view('admin.data-dokter.create')->with('polis', $polis);
    }
    public function store(Request $request)
    {
        // $request->dd();
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'id_poli' => 'nullable|exists:polis,id',
        ]);
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'dokter',
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);
        return redirect()->route('admin.data-dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        $polis = Poli::all();
        return view('admin.data-dokter.edit')->with([
            'dokter' => $dokter,
            'polis' => $polis,
        ]);
    }
    public function update(Request $request, $id)
    {
        $dokter = User::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $dokter->id,
            'password' => 'nullable|string|min:8',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'id_poli' => 'nullable|exists:polis,id',
        ]);
        $dokter->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $dokter->password,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);
        return redirect()->route('admin.data-dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $dokter = User::findOrFail($id);
        $dokter->delete();
        return redirect()->route('admin.data-dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
