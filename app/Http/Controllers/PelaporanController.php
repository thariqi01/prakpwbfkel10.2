<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\Kecamatan;
use App\Models\Bencana;
use App\Models\User;

class PelaporanController extends Controller
{
    public function pelaporan()
    {
        $users = User::all();
        $bencana = Bencana::all();
        $kecamatan = Kecamatan::all();
        $pelaporan = DB::table('pelaporan')->where('deleted_at',null)->get();
        return view('tables.pelaporan', compact('users', 'bencana', 'kecamatan'), ['pelaporan' => $pelaporan]);
    }

    public function store(Request $request)
    {      
        $users = User::all();
        $bencana = Bencana::all();
        $kecamatan = Kecamatan::all();

        $request ->validate([
            'id' => 'required',
            'id_bencana' => 'required',
            'id_kecamatan' => 'required',
            'waktu_bencana' => 'required',
            'status' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('pelaporan')->insert([
            'id' => $request->id,
            'id_bencana' => $request->id_bencana,
            'id_kecamatan' => $request->id_kecamatan,
            'waktu_bencana' => $request->waktu_bencana,
            'status' => $request->status,
        ]);

        Toastr::success('Data user berhasil ditambah','Success');
        return redirect()->back();

    }

    public function edit(Request $request, $id_pelaporan)
    {
        $request ->validate([
            'id' => 'required',
            'id_bencana' => 'required',
            'id_kecamatan' => 'required',
            'waktu_bencana' => 'required',
            'status' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Pelaporan::where(['id_pelaporan'=>$id_pelaporan])->update([
                'id' => $p['id'],
                'id_bencana' => $p['id_bencana'],
                'id_kecamatan' => $p['id_kecamatan'],
                'waktu_bencana'=>$p['waktu_bencana'],
                'status'=>$p['status'],
            ]);

            Toastr::success('Data user berhasil diubah','Warning');
            return redirect()->back();

        }
    }

    public function delete($id_pelaporan){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('pelaporan')->where('id_pelaporan',$id_pelaporan)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
        Toastr::success('Data user berhasil dihapus','Success');
        return redirect()->back();
    
    }
}
