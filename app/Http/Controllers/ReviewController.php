<?php

namespace App\Http\Controllers;

use App\Models\Lhp;
use App\Models\Pkpt;
use App\Models\Role;
use App\Models\Lhpdoc;
use App\Models\M_Status_Lhp;
use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $headermenu = 'Pelaporan';
        $menu = 'Reviu';
        return view('review.index', compact('headermenu', 'menu'));
    }

    public function getdata(Request $request)
    {
        error_reporting(0);
        $data = Pkpt::where('jenis_pengawasan', 'reviu')->orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('area_pengawasan', function ($data) {
                return $data['area_pengawasan'];
            })
            ->addColumn('jenis_pengawasan', function ($data) {
                return $data['jenis_pengawasan'];
            })
            ->addColumn('opd', function ($data) {
                return $data['opd'];
            })
            ->addColumn('action', function ($row) {
                $crud = '
                    <span class="btn btn-ghost-warning waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Proses</span>';
                return $crud;
            })
            ->addColumn('selesai', function ($data) {
                $selesai = Lhp::where('id_pkpt', $data->id)->where('status', 'S')->count();
                return $selesai;
            })
            ->addColumn('belum_selesai', function ($data) {
                $belum_selesai = Lhp::where('id_pkpt', $data->id)->where('status', 'BS')->count();
                return $belum_selesai;
            })
            ->addColumn('belum_tindak', function ($data) {
                $belum_tindak = Lhp::where('id_pkpt', $data->id)->where('status', 'BT')->count();
                return $belum_tindak;
            })
            ->addColumn('tidak_lanjut', function ($data) {
                $tidak_lanjut = Lhp::where('id_pkpt', $data->id)->where('status', 'TT')->count();
                return $tidak_lanjut;
            })
            ->addColumn('file', function ($data) {
                $files = Lhpdoc::where('id_pkpt', $data->id)->first();
                return $files->file;
            })
            ->addColumn('status', function ($data) {
                $sts = Status::where('id', $data->status)->first();
                $status = '<span class="' . $sts->text . '">' . $sts->status . '</span>';

                return $status;
            })

            ->rawColumns(['status', 'action', 'pkp', 'nota_dinas', 'area_pengawasannya'])
            ->make(true);
    }

    public function create(Request $request)
    {
        $headermenu = 'Pelaporan';
        $menu = 'Reviu';

        return view('review.create', compact('headermenu', 'menu'));
    }

    public function modal(Request $request)
    {
        $status = M_Status_Lhp::all();
        $pkpt = Pkpt::where('id', $request->id)->first();

        return view('review.modal', compact('status', 'pkpt'));
    }

    public function store(Request $request)
    {
        error_reporting(0);

        // if ($request->id == null) {

        $request->validate([
            'id_pkpt' => 'required',
            'uraian_temuan' => 'required',
            'uraian_penyebab' => 'required',
            'uraian_rekomendasi' => 'required',
            'uraian_tindak_lanjut' => 'required',
            'nilai_rekomendasi' => 'required',
            'nilai_tindak_lanjut' => 'required',
            'status_nilai' => 'required',
            'status' => 'required',
        ]);

        Lhp::create([
            'id_pkpt' => $request->id_pkpt,
            'uraian_temuan' => $request->uraian_temuan,
            'uraian_penyebab' => $request->uraian_penyebab,
            'uraian_rekomendasi' => $request->uraian_rekomendasi,
            'uraian_tindak_lanjut' => $request->uraian_tindak_lanjut,
            'nilai_rekomendasi' => $request->nilai_rekomendasi,
            'nilai_tindak_lanjut' => $request->nilai_tindak_lanjut,
            'status_nilai' => $request->status_nilai,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
        // } else {

        //     $data = [
        //         'id_pkpt' => $request->id_pkpt,
        //         'uraian_temuan' => $request->uraian_temuan,
        //         'uraian_penyebab' => $request->uraian_penyebab,
        //         'uraian_rekomendasi' => $request->uraian_rekomendasi,
        //         'uraian_tindak_lanjut' => $request->uraian_tindak_lanjut,
        //         'nilai_rekomendasi' => $request->nilai_rekomendasi,
        //         'nilai_tindak_lanjut' => $request->nilai_tindak_lanjut,
        //         'status_nilai' => $request->status_nilai,
        //         'status' => $request->status,
        //     ];

        //     Lhp::where('id', $request->id)->update($data);

        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Data Berhasil Diupdate'
        //     ]);
        // }
    }

    public function getTable(Request $request)
    {
        error_reporting(0);
        $data = Lhp::orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('id_pkpt', function ($data) {
                return  $data['id_pkpt'];
            })
            ->addColumn('uraian_temuan', function ($data) {
                return $data['uraian_temuan'];
            })
            ->addColumn('uraian_penyebab', function ($data) {
                return $data['uraian_penyebab'];
            })
            ->addColumn('uraian_rekomendasi', function ($data) {
                return $data['uraian_rekomendasi'];
            })
            ->addColumn('uraian_tindak_lanjut', function ($data) {
                return $data['uraian_tindak_lanjut'];
            })
            ->addColumn('nilai_rekomendasi', function ($data) {
                return $data['nilai_rekomendasi'];
            })
            ->addColumn('nilai_tindak_lanjut', function ($data) {
                return $data['nilai_tindak_lanjut'];
            })
            ->addColumn('status_nilai', function ($data) {
                return $data['status_nilai'];
            })
            ->addColumn('status', function ($data) {
                return $data['status'];
            })
            ->addColumn('action', function ($row) {
                $crud = '
                    <span class="btn btn-ghost-warning waves-effect waves-light btn-sm" onclick="edit(' . $row['id'] . ')">Edit</span>';
                return $crud;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
