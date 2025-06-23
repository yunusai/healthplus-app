<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class PasienController extends Controller
{
    //
    //
    public function index()
    {
        $pasiens = User::where('role', 'pasien')->get();
        return view('admin.data-pasien.index')->with('pasiens', $pasiens);
    }
    public function create()
    {
        return view('admin.data-pasien.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:50'],
            'no_ktp' => ['required', 'string', 'max:255'],
        ]);

        // Cek apakah pasien dengan no_ktp tersebut sudah ada
        $existingPatient = User::where('no_ktp', $request->no_ktp)->first();

        if ($existingPatient) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Generate No RM dengan format tahun-bulan-urutan
        $currentYearMonth = date('Ym'); // Format: 202411 untuk November 2024

        // Hitung jumlah pasien yang terdaftar dengan tahun dan bulan yang sama
        $patientCount = User::where('no_rm', 'like', $currentYearMonth . '-%')->count();

        // Buat no_rm dengan format tahun-bulan-urutan
        $no_rm = $currentYearMonth . '-' . str_pad($patientCount + 1, 3, '0', STR_PAD_LEFT);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $no_rm,
        ]);

        // event(new Registered($user));


        return redirect(route('admin.data-pasien.index', absolute: false));
    }
    public function edit($id)
    {
        $pasien = User::findOrFail($id);
        return view('admin.data-pasien.edit')->with([
            'pasien' => $pasien,
        ]);
    }
    public function update(Request $request, $id)
    {
        $pasien = User::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $pasien->id,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
        ]);
        $pasien->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $pasien->password,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('admin.data-pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->delete();
        return redirect()->route('admin.data-pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
