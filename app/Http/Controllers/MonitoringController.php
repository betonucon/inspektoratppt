<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pkpt;


class MonitoringController extends Controller
{
    public function index()
    {
        $headermenu = 'Pelaporan';
        $menu = 'Monitoring';
        return view('monitoring.index', compact('headermenu', 'menu'));
    }

    public function getdata(Request $request)
    {
        error_reporting(0);
        $data = Pkpt::where('jenis_pengawasan', 'Monitoring')->orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('id', function ($data) {
                return 'PKPT ' . $data['id'];
            })
            ->addColumn('area_pengawasan', function ($data) {
                return $data['area_pengawasan'];
            })
            ->addColumn('jenis_pengawasan', function ($data) {
                return $data['jenis_pengawasan'];
            })
            ->addColumn('opd', function ($data) {
                return $data['opd'];
            })
            ->addColumn('rmp', function ($data) {
                return $data['rmp'];
            })
            ->addColumn('rpl', function ($data) {
                return $data['rpl'];
            })
            ->addColumn('sarana_prasarana', function ($data) {
                return $data['sarana_prasarana'];
            })
            ->addColumn('tingkat_resiko', function ($data) {
                return $data['tingkat_resiko'];
            })
            ->addColumn('keterangan', function ($data) {
                return $data['keterangan'];
            })
            ->addColumn('tujuan', function ($data) {
                return $data['tujuan'];
            })
            ->addColumn('koorwas', function ($data) {
                return $data['koorwas'];
            })
            ->addColumn('pt', function ($data) {
                return $data['pt'];
            })
            ->addColumn('kt', function ($data) {
                return $data['kt'];
            })
            ->addColumn('at', function ($data) {
                return $data['at'];
            })
            ->addColumn('jumlah', function ($data) {
                return $data['jumlah'];
            })
            ->addColumn('jumlah_laporan', function ($data) {
                return $data['jumlah_laporan'] . ' ' . $data['kategori'];
            })
            // ->addColumn('action', function ($row) {
            //     $btn = '
            //     <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="edit(' . $row['id'] . ')">Edit</span>
            //     <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="hapus(' . $row['id'] . ')">Delete</span>
            // ';
            //     return $btn;
            // })
            // ->rawColumns(['action'])
            ->make(true);
    }
}
