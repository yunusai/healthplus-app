<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Periksa;
use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        $periksas = Periksa::with([
            'janjiPeriksa.pasien',          // Mengambil data pasien
            'janjiPeriksa.jadwalPeriksa'     // Mengambil jadwal terkait
        ])
            ->whereHas('janjiPeriksa.jadwalPeriksa', function ($query) {
                $query->where('id_dokter', Auth::user()->id); // Filter dokter login
            })
            ->get();

        return view('dokter.riwayat-pasien.index', [
            'periksas' => $periksas // Mengirim data periksa ke view
        ]);
    }

    public function riwayat($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['jadwalPeriksa.dokter'])->findOrFail($id);
        $riwayat = $janjiPeriksa->riwayatPeriksa;

        return view('dokter.riwayat-pasien.riwayat')->with([
            'riwayat' => $riwayat,
            'janjiPeriksa' => $janjiPeriksa,
        ]);
    }
}
