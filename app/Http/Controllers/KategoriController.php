<?php

namespace App\Http\Controllers;

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

        return redirect('kategori')->with('tambah','Data berhasil ditambah!');    
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

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }
    // public function edit($id)
    // {
    //     // mengambil data siswa berdasarkan id yang dipilih
    //     $kategori = DB::table('kategori')->where('id_kategoribencana',$id)->get(); 
        
    //     // passing data siswa yang didapat ke view edit.blade.php 
    //     return view('form edit.kategoriedit',['kategori' => $kategori]);
    // }   

    // public function update(Request $request)
    // {
    //     DB::table('kategori')->where('id_kategoribencana',$request->id)->update(['kategori_bencana' => $request->kategori_bencana]);

    //     return redirect('/kategori');
    // }
    
    public function delete($id_kategoribencana){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kategori')->where('id_kategoribencana',$id_kategoribencana)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('/kategori');
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

        return redirect('kategori/bin')->with('status','Data berhasil di-restore!'); 

    }

    public function deleteperm($id_kategoribencana = null)
    {
        if($id_kategoribencana != null){
            $kategori_bencana = Kategori::onlyTrashed()->where('id_kategoribencana', $id_kategoribencana)->forceDelete();
        }else {
            $kategori_bencana = Kategori::onlyTrashed()->forceDelete();
        }

        return redirect('kategori/bin')->with('status','Data berhasil dihapus permanen!');
    }


}
