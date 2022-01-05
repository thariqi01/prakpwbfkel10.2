<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function kategori()
    {
        $kategori = DB::table('kategori')->where('deleted_at',null)->get();    
        return view('tables.kategori',['kategori' => $kategori]);
    }
    
    public function store(Request $request)
    {      
        $request ->validate([
            'kategori_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('kategori')->insert([
            'kategori_bencana' => $request->kategori_bencana,
        ]);

        Toastr::success('Data kategori bencana berhasil ditambah','Tambah');
        return redirect()->back();
   
    }

    public function edit(Request $request, $id_kategoribencana)
    {
        $request ->validate([
            'kategori_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Kategori::where(['id_kategoribencana'=>$id_kategoribencana])->update([
                'kategori_bencana'=>$p['kategori_bencana'],
            ]);

            Toastr::warning('Data kategori bencana berhasil diubah','Edit');
            return redirect()->back();

        }
    }
    
    public function delete($id_kategoribencana){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kategori')->where('id_kategoribencana',$id_kategoribencana)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);
        
        Toastr::error('Data kategori bencana berhasil dihapus','Hapus');
        return redirect()->back();
    }

    public function bin()
    {
        $kategori = Kategori::onlyTrashed()->get();
        return view('bin.kategoribin', ['kategori' => $kategori]);
    }

    public function restore($id_kategoribencana = null)
    {
        if($id_kategoribencana != null){
            $kategori_bencana = Kategori::onlyTrashed()->where('id_kategoribencana', $id_kategoribencana)->restore();
        }else {
            $kategori_bencana = Kategori::onlyTrashed()->restore();
        }

        Toastr::info('Data kategori bencana berhasil dihapus','Restore');
        return redirect()->back();  

    }

    public function deleteperm($id_kategoribencana = null)
    {
        if($id_kategoribencana != null){
            $kategori_bencana = Kategori::onlyTrashed()->where('id_kategoribencana', $id_kategoribencana)->forceDelete();
        }else {
            $kategori_bencana = Kategori::onlyTrashed()->forceDelete();
        }

        Toastr::error('Data kategori bencana berhasil dihapus permanen','Hapus Permanen');      
        return redirect()->back();
        
    }


}
