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
}
