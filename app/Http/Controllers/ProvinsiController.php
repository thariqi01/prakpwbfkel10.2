<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    public function provinsi()
    {
        $provinsi = DB::table('provinsi')->where('deleted_at',null)->get();
        return view('tables.provinsi',['provinsi' => $provinsi]);
    }
    
    public function store(Request $request)
    {      
        $request ->validate([
            'nama_provinsi' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('provinsi')->insert([
            'nama_provinsi' => $request->nama_provinsi,
        ]);

        Toastr::success('Data user berhasil ditambah','Success');
        return redirect()->back();

    }

    public function edit(Request $request, $id_provinsi)
    {
        $request ->validate([
            'nama_provinsi' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Provinsi::where(['id_provinsi'=>$id_provinsi])->update([
                'nama_provinsi'=>$p['nama_provinsi'],
            ]);

            Toastr::success('Data user berhasil diubah','Warning');
            return redirect()->back();

        }
    }
    
    public function delete($id_provinsi){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('provinsi')->where('id_provinsi',$id_provinsi)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        Toastr::success('Data user berhasil dihapus','Success');
        return redirect()->back();
    
    }

    public function bin()
    {
        $provinsi = Provinsi::onlyTrashed()->get();
        return view('bin.provinsibin', ['provinsi' => $provinsi]);
    }

    public function restore($id_provinsi = null)
    {
        if($id_provinsi != null){
            $nama_provinsi = Provinsi::onlyTrashed()->where('id_provinsi', $id_provinsi)->restore();
        }else {
            $nama_provinsi = Provinsi::onlyTrashed()->restore();
        }

        Toastr::success('Data user berhasil dihapus','Info');
        return redirect()->back(); 

    }

    public function deleteperm($id_provinsi = null)
    {
        if($id_provinsi != null){
            $nama_provinsi = Provinsi::onlyTrashed()->where('id_provinsi', $id_provinsi)->forceDelete();
        }else {
            $nama_provinsi = Provinsi::onlyTrashed()->forceDelete();
        }

        Toastr::success('Data user berhasil dihapus permanen','Error');      
        return redirect()->back();    
    
    }
}
