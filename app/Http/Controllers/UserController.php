<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

    public function index(request $request)
    {
        $headermenu = 'Master Data';
        $menu = 'User';
        return view('user.index', compact('headermenu', 'menu'));
    }

    public function getdata(request $request)
    {
        error_reporting(0);
        $data = User::orderBy('id', 'Asc')->get();

        return Datatables::of($data)
            ->addColumn('name', function ($data) {
                return $data['name'];
            })
            ->addColumn('email', function ($data) {
                return $data['email'];
            })
            ->addColumn('username', function ($data) {
                return $data['username'];
            })
            ->addColumn('role_id', function ($data) {
                return $data->Roles->nama;
            })
            ->addColumn('action', function ($row) {
                $btn = '
                <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Edit</span>
                <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="delete_data(' . $row['id'] . ')">Delete</span>
            ';
                return $btn;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function modal(Request $request)
    {
        error_reporting(0);

        $data = User::where('id', $request->id)->first();
        $role = Role::all();

        return view('user.modal', compact('data', 'role'));
    }

    public function destroy(Request $request)
    {
        $data = User::where('id', $request->id)->first();
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
                'name' => 'required',
                'email' => 'required',
                'username' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ];


            User::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan'
            ]);
        } else {
            $data = User::where('id', $request->id)->first();
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'role_id' => $request->role_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate'
            ]);
        }
    }
}
