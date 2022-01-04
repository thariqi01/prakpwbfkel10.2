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

        Toastr::success('Data user berhasil ditambah','Success');
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

            Toastr::success('Data user berhasil diubah','Warning');
            return redirect()->back();

        }
    }

    public function delete($id_kecamatan){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kecamatan')->where('id_kecamatan',$id_kecamatan)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        Toastr::success('Data user berhasil dihapus','Success');
        return redirect()->back();

    }
}
