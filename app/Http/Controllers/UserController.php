<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user()
    {
        $users = DB::table('users')->where('deleted_at',null)->get();
        return view('tables.user',['users' => $users]);
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required|string|max:255|min:6|regex:/^[a-zA-Z\s\.]*$/',
            'email' => 'required|string|max:255|min:12|email',
            'tgl_lahir' => 'required|date',
            'password' => 'required|string|min:8',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => $request->password                     
        ]);

        Toastr::success('Data user berhasil ditambah','Tambah');
        return redirect()->back();

    }

    public function edit(Request $request, $id)
    {
        $request ->validate([
            'name' => 'required|string|max:255|min:6|regex:/^[a-zA-Z\s\.]*$/',
            'email' => 'required|string|max:255|min:12|email',
            'tgl_lahir' => 'required|date',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            User::where(['id'=>$id])->update([
                'name'=>$p['name'], 
                'email'=>$p['email'], 
                'tgl_lahir'=>$p['tgl_lahir'], 
            ]);

            Toastr::warning('Data user berhasil diubah','Edit');
            return redirect()->back();

        }
    }   

    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('users')->where('id',$id)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);

        Toastr::error('Data user berhasil dihapus','Hapus');
        return redirect()->back();
    }

    public function bin()
    {
        $users = User::onlyTrashed()->get();
        return view('bin.userbin', ['users' => $users]);
    }

    public function restore($id = null)
    {
        if($id != null){
            $users = User::onlyTrashed()->where('id', $id)->restore();
        }else {
            $users = User::onlyTrashed()->restore();
        }

        Toastr::info('Data user berhasil direstore','Restore');
        return redirect()->back(); 

    }

    public function deleteperm($id = null)
    {
        if($id != null){
            $users = User::onlyTrashed()->where('id', $id)->forceDelete();
        }else {
            $users = User::onlyTrashed()->forceDelete();
        }

        Toastr::error('Data user berhasil dihapus secara permanen','Hapus Permanen');      
        return redirect()->back();

    }

}
