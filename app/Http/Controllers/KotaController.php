<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;

class KotaController extends Controller
{   
    public function kota()
    {
        $provinsi = Provinsi::all();
        
        $kota = DB::table('kota')->where('deleted_at',null)->get();
        return view('tables.kota', compact('provinsi'), ['kota' => $kota]);
    }

    public function store(Request $request)
    {      
        $provinsi = Provinsi::all();

        $request ->validate([
            'id_provinsi' => 'required',
            'nama_kota' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('kota')->insert([
            'id_provinsi' => $request->id_provinsi,
            'nama_kota' => $request->nama_kota,
        ]);

        return redirect('kota')->with('tambah','Data berhasil ditambah!');    
    }

    public function edit(Request $request, $id_kota)
    {
        $request ->validate([
            'id_provinsi' => 'required',
            'nama_kota' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Kota::where(['id_kota'=>$id_kota])->update([
                'id_provinsi' => $p['id_provinsi'],
                'nama_kota'=>$p['nama_kota'],
            ]);

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }

    public function delete($id_kota){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kota')->where('id_kota',$id_kota)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('kota')->with('hapus','Data berhasil dihapus!');
    }
}
