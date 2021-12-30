<?php

namespace App\Http\Controllers;

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

        return redirect('provinsi')->with('tambah','Data berhasil ditambah!');    
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

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }
    // public function edit($id){
    //     // mengambil data siswa berdasarkan id yang dipilih
    //     $provinsi = DB::table('provinsi')->where('id_provinsi',$id)->get(); 
          
    //     // passing data siswa yang didapat ke view edit.blade.php 
    //     return view('edit.provinsiedit',['provinsi' => $provinsi]);
    // }  

    // public function update(Request $request){
    //     // update data siswa
    //     DB::table('provinsi')->where('id_provinsi',$request->id)->update([
    //         'nama_provinsi' => $request->nama_provinsi
    //     ]);
    
    //     // alihkan halaman ke halaman siswa
    //     return redirect('/provinsi');
    // }   

    
    public function delete($id_provinsi){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('provinsi')->where('id_provinsi',$id_provinsi)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('/provinsi');
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

        return redirect('provinsi/bin')->with('status','Data berhasil di-restore!'); 

    }

    public function deleteperm($id_provinsi = null)
    {
        if($id_provinsi != null){
            $nama_provinsi = Provinsi::onlyTrashed()->where('id_provinsi', $id_provinsi)->forceDelete();
        }else {
            $nama_provinsi = Provinsi::onlyTrashed()->forceDelete();
        }

        return redirect('provinsi/bin')->with('status','Data berhasil dihapus permanen!');
    }
}
