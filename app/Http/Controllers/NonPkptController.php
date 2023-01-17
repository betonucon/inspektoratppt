<?php

namespace App\Http\Controllers;

use App\Models\JenisPengawasan;
use App\Models\Opd;
use App\Models\Bulan;
use App\Models\M_TingkatResiko;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Pkpt;

class NonPkptController extends Controller
{
    public function create(Request $request)
    {
        error_reporting(0);
        $headermenu = 'Perencanaan';
        $menu = 'Penyusunan Non PKPT';
        $jenisPengawasan = JenisPengawasan::all();
        $opd = Opd::all();
        $rmp = Bulan::all();
        $tingkatResiko = M_TingkatResiko::all();
        return view('non_pkpt.create', compact('jenisPengawasan', 'opd', 'rmp', 'menu', 'headermenu', 'tingkatResiko'));
    }

    public function edit(Request $request)
    {
        error_reporting(0);
        $headermenu = 'Perencanaan';
        $menu = 'Penyusunan Non PKPT';
        $data = Pkpt::where('id', $request->id)->first();
        $jenisPengawasan = JenisPengawasan::all();
        $opd = Opd::all();
        $rmp = Bulan::all();
        $tingkatResiko = M_TingkatResiko::all();
        return view('non_pkpt.edit', compact('data', 'jenisPengawasan', 'opd', 'rmp', 'menu', 'headermenu', 'tingkatResiko'));
    }

    public function store(Request $request)
    {
        error_reporting(0);

        $request->validate([
            'area_pengawasan' => 'required',
            'jenis_pengawasan' => 'required',
            'opd' => 'required',
            'rmp' => 'required',
            'rpl' => 'required',
            'sarana_prasarana' => 'required',
            'tingkat_resiko' => 'required',
            'keterangan' => 'required',
            'tujuan' => 'required',
            'koorwas' => 'required',
            'pt' => 'required',
            'kt' => 'required',
            'at' => 'required',
            'jumlah' => 'required',
            'jumlah_laporan' => 'required',
        ]);

        if ($request->id == null) {

            Pkpt::create([
                'area_pengawasan' => $request->area_pengawasan,
                'jenis_pengawasan' => $request->jenis_pengawasan,
                'opd' => $request->opd,
                'rmp' => $request->rmp,
                'rpl' => $request->rpl,
                'sarana_prasarana' => $request->sarana_prasarana,
                'tingkat_resiko' => $request->tingkat_resiko,
                'keterangan' => $request->keterangan,
                'tujuan' => $request->tujuan,
                'koorwas' => $request->koorwas,
                'pt' => $request->pt,
                'kt' => $request->kt,
                'at' => $request->at,
                'jumlah' => $request->jumlah,
                'jumlah_laporan' => $request->jumlah_laporan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan'
            ]);
        } else {
            $data = Pkpt::where('id', $request->id)->first();
            $data->update([
                'area_pengawasan' => $request->area_pengawasan,
                'jenis_pengawasan' => $request->jenis_pengawasan,
                'opd' => $request->opd,
                'rmp' => $request->rmp,
                'rpl' => $request->rpl,
                'sarana_prasarana' => $request->sarana_prasarana,
                'tingkat_resiko' => $request->tingkat_resiko,
                'keterangan' => $request->keterangan,
                'tujuan' => $request->tujuan,
                'koorwas' => $request->koorwas,
                'pt' => $request->pt,
                'kt' => $request->kt,
                'at' => $request->at,
                'jumlah' => $request->jumlah,
                'jumlah_laporan' => $request->jumlah_laporan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate'
            ]);
        }
    }
}
