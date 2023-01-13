<?php

namespace App\Http\Controllers;

use App\Models\KertasKerja;
use App\Models\Lhp;
use App\Models\Pkpt;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = 'Dashboard';


        return view('dashboard.index', compact('menu'));
    }

    public function json(){
        $all = Lhp::count();
        $belumTindakLanjut = Lhp::where('status', 'BT')->count();
        $tidakDapatDitindaklanjuti = Lhp::where('status', 'TT')->count();
        $sesuai = Lhp::where('status', 'S')->count();
        $belumSesuai = Lhp::where('status', 'BS')->count();
        $pkpt=PKPT::count();
        $programkerja=ProgramKerja::count();
        $kertaskerja=KertasKerja::count();
        $data=[
            "xValues" => ['Total LHP',"Belum Ditindaklanjuti", "Tidak Dapat Ditindaklanjuti", "Sesuai", "Belum Sesuai"],
            "donut" => [
                $pkpt,
                $programkerja,
                $kertaskerja,

            ],
            "yValues" => [
                $all,
                $belumTindakLanjut,
                $tidakDapatDitindaklanjuti,
                $sesuai,
                $belumSesuai
            ],
            "barColors" => [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
          
            ],
            "donutColors" => [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
          
            ],
            "labels" => [
                'PKPT',
                'Program Kerja',
                'Kertas Kerja',
          
              ]

            ];
        return json_encode($data);
    }
}