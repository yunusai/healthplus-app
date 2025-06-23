<?php

namespace App\Http\Controllers\Admin;

use App\Models\Obat;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pasienCount = User::where('role', 'pasien')->count();
        $dokterCount = User::where('role', 'dokter')->count();
        $obatCount = Obat::count();
        $poliCount = Poli::count();

        return view('admin.dashboard')->with([
            'dokterCount' => $dokterCount,
            'pasienCount' => $pasienCount,
            'obatCount' => $obatCount,
            'poliCount' => $poliCount,
        ]);
    }
}
