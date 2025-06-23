<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PoliController extends Controller
{
    // Your methods for handling poli requests will go here
    public function index()
    {
        $polis = Poli::all(); // Assuming you have a Poli model
        return view('admin.poli.index', compact('polis'));
    }
    public function create()
    {
        return view('admin.poli.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
        ]);

        Poli::create($request->all());

        return redirect()->route('admin.poli.index')->with('poli-created', 'Berhasil membuat Poli.');
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($request->all());

        return redirect()->route('admin.poli.index')->with('poli-updated', 'Berhasil memperbarui Poli.');
    }
    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('admin.poli.index')->with('poli-deleted', 'Berhasil menghapus Poli.');
    }
}
