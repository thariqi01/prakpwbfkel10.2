<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\PelaporanTemp;
use Illuminate\Http\Request;

class PelaporanTempController extends Controller
{
    public function store(Request $request)
    {      
        $request ->validate([
            'nama_pelapor' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
            'email_pelapor' => 'required|string|max:255|email',
            'nama_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
            'lokasi_bencana' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
            'status_bencana' => 'required|string|max:500|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if ($request->fails()) {
            Alert::error('error', 'Validation Errors');
            return redirect()->back();
        }
        
        DB::table('pelaporan_temp')->insert([
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nama_bencana' => $request->nama_bencana,
            'lokasi_bencana' => $request->lokasi_bencana,
            'status_bencana' => $request->status_bencana,
        ]);
        
        Alert::success('Laporan Bencana', 'Laporan anda berhasil kami terima');
        return redirect()->back();
    
    }
}
