<?php

namespace App\Http\Controllers;

use App\Models\Pkpt;
use App\Models\Status;
use App\Models\KertasKerja;
use App\Models\Viewkertaskerja;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use ConvertApi\ConvertApi;
class KertasKerjaController extends Controller
{
    public function index()
    {
        $headermenu = 'Perencanaan';
        $menu = 'Kertas Kerja Pemeriksaan';
        return view('kertaskerja.index', compact('headermenu', 'menu'));
    }

    public function modal(Request $request)
    {
        error_reporting(0);
        $pkpt = Pkpt::all();
        $data = KertasKerja::where('id', $request->id)->first();
        return view('kertaskerja.modal', compact('pkpt', 'data'));
    }
    public function tampil_detail(Request $request)
    {
        error_reporting(0);
        $data = Pkpt::where('jenis',$request->jenis)->orderBy('id','Asc')->get();
        return view('kertaskerja.modaldetail', compact('data'));
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
        $data = KertasKerja::orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('jenis', function ($data) {
                $pkpt = Pkpt::where('id', $data->id_pkpt)->first();
                return $pkpt['jenis'];
            })
            ->addColumn('id_pkpt', function ($data) {
                $pkpt = Pkpt::where('id', $data->id_pkpt)->first();
                return '<a href="javascript:;" onclick="tampil(`'.$pkpt->id_pkpt.'`)">'.substr($pkpt->area_pengawasan,0,50).'...</a>';
            })
            ->addColumn('text_area_pengawasan', function ($data) {
                return '<a href="javascript:;" onclick="tampil_detail(`'.$data->jenis.'`)">[PKPT'.$data['id_pkpt'].']'.substr($data->area_pengawasan,0,70).'...</a>';
            })
            ->addColumn('file', function ($data) {
                $file='<img onclick="buka_file(`'.$data['file'].'`)" src="' . asset('public/img/pdf-file.png') . '" width="30px" height="30px">';
                return $file;
            })
            ->addColumn('status', function ($data) {
                $sts= Status::where('id',$data->status)->first();
                $status='<span class="'.$sts->text.'">'.$sts->status.'</span>';
                return $status;
            })
            ->addColumn('action', function ($row) {
                $roles =  Auth::user()->role_id;
                $status = $row['status'];
                $sts= Status::where('id',$row->status)->first();
                if ($roles == 6) {
                    if ($status == 0 || $status == 1) {
                        $btn = '
                    <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="approved(' . $row['id'] . ')">Approved</span>
                    <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="refused(' . $row['id'] . ')">Refused</span>
                ';
                    } else {
                        $btn = '<span class="'.$sts->text.'"><i class="fa fa-check"></i> '.$sts->sts_keterangan.'</span>';
                    }
                } else {
                    if ($status > 1) {
                        $btn = '<span class="'.$sts->text.'"><i class="fa fa-check"></i> '.$sts->sts_keterangan.'</span>';
                    } else {
                        $btn = '
                        <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Edit</span>
                        <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="hapus(' . $row['id'] . ')">Delete</span>
                    ';
                    }
                }
                return $btn;
            })
            ->rawColumns(['status', 'action','file'])
            ->make(true);
    }

    public function store(Request $request)
    {
        error_reporting(0);
        ConvertApi::setApiSecret('8hHtmz5CYPolhdvq');
        if ($request->id == null) {

            $request->validate([
                'id_pkpt' => 'required',
                'file' => 'required||mimes:xlsx,xls|max:2048',
            ]);

            $data = [
                'id_pkpt' => $request->id_pkpt,
                'status' => 1,
            ];

            if ($files = $request->file('file')) {
                //insert new file
                $namapkp=date('YmdHis') ;
                $destinationPath = 'public/file_upload/'; // upload path
                $profileImage = $namapkp. "." . $files->getClientOriginalExtension();
                $files->move(public_path('/file_upload'), $profileImage);
                $data['file'] = "$namapkp.pdf";
                KertasKerja::create($data);
                $result = ConvertApi::convert('pdf', ['File' =>'public/file_upload/'.$namapkp.'.xlsx']);
                $pdf=$result->getFile()->save('public/file_upload/'.$namapkp.'.pdf');

                
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan'
            ]);



        } else {
            $data = KertasKerja::where('id', $request->id)->first();
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
        $data = KertasKerja::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Dihapus'
        ]);
    }

    public function approved(Request $request)
    {
        $data = KertasKerja::where('id', $request->id)->first();
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
        $data = KertasKerja::where('id', $request->id)->first();
        $data->update([
            'status' => 3,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Direfused'
        ]);
    }
}
