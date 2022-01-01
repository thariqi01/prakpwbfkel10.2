<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\Detail;


class DetailController extends Controller
{
    public function detail()
    {
        $pelaporan = Pelaporan::all();

        $detailkorban = DB::table('detailkorban')->where('deleted_at',null)->get();
        return view('tables.detail', compact('pelaporan'), ['detailkorban' => $detailkorban]);
    }

    public function store(Request $request)
    {      
        $pelaporan = Pelaporan::all();
    
        $request ->validate([
            'id_pelaporan' => 'required',
            'nik' => 'required|max:16|min:16|regex:/^[0-9]/',
            'nama' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
            'umur' => 'required|string|max:2|min:1|regex:/^[0-9]{2}$/',
            'kondisi' => 'required',

        ]);
        
        DB::table('detailkorban')->insert([
            'id_pelaporan' => $request->id_pelaporan,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->back()->with('tambah','Data berhasil ditambah!'); 
    }

    public function edit(Request $request, $id_detailkorban)
    {
        $request ->validate([
            'id_pelaporan' => 'required',
            'nik' => 'required|max:16|min:16|regex:/^[0-9]/',
            'nama' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
            'umur' => 'required|string|max:2|min:1|regex:/^[0-9]{2}$/',
            'kondisi' => 'required',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Pelaporan::where(['id_detailkorban'=>$id_detailkorban])->update([
                'id_pelaporan' => $p['id_pelaporan'],
                'nik' => $p['nik'],
                'nama' => $p['nama'],
                'umur'=>$p['umur'],
                'kondisi'=>$p['kondisi'],
            ]);

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }
}
