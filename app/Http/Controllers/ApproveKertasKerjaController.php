<?php

namespace App\Http\Controllers;

use App\Models\ApproveKertasKerja;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pkpt;
use Illuminate\Support\Facades\Auth;

class ApproveKertasKerjaController extends Controller
{
    public function index()
    {
        $headermenu = 'Perencanaan';
        $menu = 'Program Kerja Pengawasan Tahunan';
        return view('approve_kertaskerja.index', compact('headermenu', 'menu'));
    }

    public function modal(Request $request)
    {
        error_reporting(0);
        $pkpt = Pkpt::all();
        $data = ApproveKertasKerja::where('id', $request->id)->first();
        return view('approve_kertaskerja.modal', compact('pkpt', 'data'));
    }

    public function getJenisPengawasan(Request $request)
    {
        $data = Pkpt::where('id', $request->id)->first();
        $e = $data->jenisPengawasan->jenis;
        return response()->json([
            'status' => 'success',
            'data' => $e
        ]);
    }

    public function getdata(Request $request)
    {
        error_reporting(0);
        $data = ApproveKertasKerja::orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('id_pkpt', function ($data) {
                return 'PKPT ' . $data['id_pkpt'];
            })
            ->addColumn('file', function ($data) {
                return $data['file'];
            })
            ->addColumn('status', function ($data) {
                $pending = '<span class="text-warning">Pending</span>';
                $approved = '<span class="text-success">Approved</span>';
                $refused = '<span class="text-danger">Refused</span>';
                if ($data['status'] == 1) {
                    return $pending;
                } elseif ($data['status'] == 2) {
                    return $approved;
                } else {
                    return $refused;
                }
            })
            ->addColumn('action', function ($row) {
                $roles =  Auth::user()->role_id;
                $status = $row['status'];
                if ($roles == 6) {
                    if ($status == 1) {
                        $btn = '
                    <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="approved(' . $row['id'] . ')">Approved</span>
                    <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="refused(' . $row['id'] . ')">Refused</span>
                ';
                    } else {
                        $btn = '<span class="text-info"><i class="fa fa-check"></i> Success</span>';
                    }
                } else {
                    if ($status > 1) {
                        $btn = '<span class="text-info"><i class="fa fa-check"></i> Success</span>';
                    } else {
                        $btn = '
                        <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Edit</span>
                        <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="hapus(' . $row['id'] . ')">Delete</span>
                    ';
                    }
                }
                return $btn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        error_reporting(0);

        if ($request->id == null) {

            $request->validate([
                'id_pkpt' => 'required',
                'file' => 'required||mimes:pdf|max:2048',
            ]);

            $data = [
                'id_pkpt' => $request->id_pkpt,
                'status' => 1,
            ];

            if ($files = $request->file('file')) {
                //insert new file
                $destinationPath = 'public/file_upload/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move(public_path('/file_upload'), $profileImage);
                $data['file'] = "$profileImage";
            }

            ApproveKertasKerja::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan'
            ]);
        } else {
            $data = ApproveKertasKerja::where('id', $request->id)->first();
            $data->update([
                'id_pkpt' => $request->id_pkpt,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $data = ApproveKertasKerja::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Dihapus'
        ]);
    }

    public function approved(Request $request)
    {
        $data = ApproveKertasKerja::where('id', $request->id)->first();
        $data->update([
            'status' => 2,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Diapproved'
        ]);
    }

    public function refused(Request $request)
    {
        $data = ApproveKertasKerja::where('id', $request->id)->first();
        $data->update([
            'status' => 3,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Direfused'
        ]);
    }
}
