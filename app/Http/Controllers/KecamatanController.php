<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kota;

class KecamatanController extends Controller
{
    public function kecamatan()
    {
        $kota = Kota::all();
        $kecamatan = DB::table('kecamatan')->where('deleted_at',null)->get();
        return view('tables.kecamatan', compact('kota'), ['kecamatan' => $kecamatan]);
    }

    public function store(Request $request)
    {      
        $kota = Kota::all();

        $request ->validate([
            'id_kota' => 'required',
            'nama_kecamatan' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('kecamatan')->insert([
            'id_kota' => $request->id_kota,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        Toastr::success('Data kecamatan berhasil ditambah','Tambah');
        return redirect()->back();

    }

    public function edit(Request $request, $id_kecamatan)
    {
        $request ->validate([
            'id_kota' => 'required',
            'nama_kecamatan' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Kecamatan::where(['id_kecamatan'=>$id_kecamatan])->update([
                'id_kota' => $p['id_kota'],
                'nama_kecamatan'=>$p['nama_kecamatan'],
            ]);

            Toastr::warning('Data kecamatan berhasil diubah','Edit');
            return redirect()->back();

        }
    }

    public function delete($id_kecamatan){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kecamatan')->where('id_kecamatan',$id_kecamatan)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        Toastr::error('Data user berhasil dihapus','Hapus');
        return redirect()->back();

    }

    public function bin()
    {
        $kecamatan = Kecamatan::onlyTrashed()->get();
        return view('bin.kecamatanbin', ['kecamatan' => $kecamatan]);
    }

    public function restore($id_kecamatan = null)
    {
        if($id_kecamatan != null){
            $nama_kecamatan = Kecamatan::onlyTrashed()->where('id_kecamatan', $id_kecamatan)->restore();
        }else {
            $nama_kecamatan = Kecamatan::onlyTrashed()->restore();
        }

        Toastr::info('Data kecamatan berhasil dihapus','Restore');
        return redirect()->back(); 

    }

    public function deleteperm($id_kecamatan = null)
    {
        if($id_kecamatan != null){
            $nama_kecamatan = Kecamatan::onlyTrashed()->where('id_kecamatan', $id_kecamatan)->forceDelete();
        }else {
            $nama_kecamatan = Kecamatan::onlyTrashed()->forceDelete();
        }

        Toastr::error('Data kecamatan berhasil dihapus permanen','Hapus Permanen');      
        return redirect()->back();    
    
    }
}
