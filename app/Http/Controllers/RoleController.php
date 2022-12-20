<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(request $request)
    {
        $active = 'role';
        $headermenu = 'Master Data';
        $menu = 'Role';
        return view('role.index', compact('headermenu', 'menu', 'active'));
    }

    public function getdata(request $request)
    {
        error_reporting(0);
        $data = Role::where('aktif', 1)->get();

        return Datatables::of($data)
            ->addColumn('nama', function ($data) {
                return $data['nama'];
            })
            ->addColumn('action', function ($row) {
                $btn = '
                <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Edit</span>
                <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="hapus(' . $row['id'] . ')">Delete</span>
            ';
                return $btn;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function modal(Request $request)
    {
        error_reporting(0);

        $data = Role::where('id', $request->id)->first();
        return view('role.modal', compact('data'));
    }

    public function destroy(Request $request)
    {
        $data = Role::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Dihapus'
        ]);
    }


    public function store(Request $request)
    {
        error_reporting(0);

        if ($request->id == null) {

            $request->validate([
                'nama' => 'required',
            ]);

            $data = [
                'nama' => $request->nama,
                'aktif' => 1
            ];


            Role::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan'
            ]);
        } else {
            $data = Role::where('id', $request->id)->first();
            $data->update([
                'nama' => $request->nama,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate'
            ]);
        }
    }
}
