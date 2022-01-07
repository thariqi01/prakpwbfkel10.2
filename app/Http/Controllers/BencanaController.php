<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
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

        Toastr::success('Data bencana berhasil ditambah','Tambah');
        return redirect()->back();

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

            Toastr::warning('Data bencana berhasil diubah','edit');
            return redirect()->back();

        }
    }

    public function delete($id_bencana){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('bencana')->where('id_bencana',$id_bencana)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);
        
        Toastr::error('Data bencana berhasil dihapus','Hapus');
        return redirect()->back();

    }

    public function bin()
    {
        $bencana = Bencana::onlyTrashed()->get();
        return view('bin.bencanabin', ['bencana' => $bencana]);
    }

    public function restore($id_bencana = null)
    {
        if($id_bencana != null){
            $bencana = Bencana::onlyTrashed()->where('id_bencana', $id_bencana)->restore();
        }else {
            $bencana = Bencana::onlyTrashed()->restore();
        }

        Toastr::info('Data bencana berhasil dihapus','Restore');
        return redirect()->back(); 

    }

    public function deleteperm($id_bencana = null)
    {
        if($id_bencana != null){
            $bencana = Bencana::onlyTrashed()->where('id_bencana', $id_bencana)->forceDelete();
        }else {
            $bencana = Bencana::onlyTrashed()->forceDelete();
        }

        Toastr::error('Data bencana berhasil dihapus permanen','Hapus Permanen');      
        return redirect()->back();    
    
    }
}
