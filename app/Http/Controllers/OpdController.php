<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Opd;

class OpdController extends Controller
{
    public function index(request $request)
    {
        $headermenu = 'Master Data';
        $menu = 'OPD';
        return view('opd.index', compact('headermenu','menu'));
    }
    public function getdata(request $request)
    {
        error_reporting(0);
        $data = Opd::where('aktif', 1)->get();

        return Datatables::of($data)
        ->addColumn('nama', function($data){
            return $data['nama'];
        })
        ->addColumn('action', function ($row) {
            $btn='
                <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah('.$row['id'].')">Edit</span>
                <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="hapus('.$row['id'].')">Delete</span>
            ';
            return $btn;
        })
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function modal(request $request){
        error_reporting(0);

        $id= $request->id;
        $data = Opd::where('id',$request->id)->first();

        return view('opd.modal', compact('data','id'));
    }

    public function delete(request $request){
        $data = Opd::where('id',$request->id)->update(['aktif'=>0]);
    }

   
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['nama']= 'required';
        $messages['nama.required']= 'Lengkapi Kolom Jenis';
       
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div class="nitof"><b>Silahkan periksa kembali !</b><br><div class="isi-nitof">';
                foreach(parsing_validator($val) as $value){
                    
                    foreach($value as $isi){
                        echo $isi.'<br>';
                    }
                }
            echo'</div></div>';
        }else{
            if($request->id==0){
                
                $data=Opd::create([
                    'nama'=>$request->nama,
                    'aktif'=>1,
                ]);

                echo'ok';
                
            }else{
                $data=Opd::where('id',$request->id)->update([
                    'nama'=>$request->nama,
                    'aktif'=>1,
                ]);

                echo'ok';
            }
        }
    }
}
