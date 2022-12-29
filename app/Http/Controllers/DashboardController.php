<?php

namespace App\Http\Controllers;

use App\Models\Lhp;
use App\Models\Pkpt;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = 'Dashboard';
        $belumTindakLanjut = Lhp::where('status', 'BT')->count();
        $tidakDapatDitindaklanjuti = Lhp::where('status', 'TT')->count();
        $sesuai = Lhp::where('status', 'S')->count();
        $belumSesuai = Lhp::where('status', 'BS')->count();


        return view('dashboard.index', compact('menu', 'belumTindakLanjut', 'tidakDapatDitindaklanjuti', 'sesuai', 'belumSesuai'));
    }
}
