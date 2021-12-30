<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Bencana;
use App\Models\Kategori;

class BencanaController extends Controller
{
    public function bencana()
    {
        $kategori = Kategori::all();
        $bencana = DB::table('bencana')->where('deleted_at',null)->get();
        return view('tables.bencana', compact('kategori'), ['bencana' => $bencana]);
    }

    public function store(Request $request)
    {      
        $kota = Bencana::all();

        $request ->validate([
            'id_kategoribencana' => 'required',
            'nama_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('bencana')->insert([
            'id_kategoribencana' => $request->id_kategoribencana,
            'nama_bencana' => $request->nama_bencana,
        ]);

        return redirect('bencana')->with('tambah','Data berhasil ditambah!');    
    }

    public function edit(Request $request, $id_bencana)
    {
        $request ->validate([
            'id_kategoribencana' => 'required',
            'nama_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Bencana::where(['id_bencana'=>$id_bencana])->update([
                'id_kategoribencana' => $p['id_kategoribencana'],
                'nama_bencana'=>$p['nama_bencana'],
            ]);

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }

    public function delete($id_bencana){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('bencana')->where('id_bencana',$id_bencana)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('bencana')->with('hapus','Data berhasil dihapus!');
    }
}
