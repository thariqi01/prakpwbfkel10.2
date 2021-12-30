<?php

namespace App\Http\Controllers;

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

        return redirect('user')->with('tambah','Data berhasil ditambah!');
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

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
        // // mengambil data user berdasarkan id yang dipilih
        // $users = DB::table('users')->where('id',$id)->get(); 
          
        // // passing data user yang didapat ke view edit.blade.php 
        // return view('edit.useredit',['users' => $users]);
    }   

    // public function update(Request $request)
    // {
    //     $request ->validate([
    //         'name' => 'required|string|max:255|min:6|regex:/^[A-Za-z]+$/',
    //         'email' => 'required|string|max:255|min:12|email',
    //         'tgl_lahir' => 'required|date',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     DB::table('users')->where('id',$request->id)->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'password' => $request->password
    //     ]);        

    //     return redirect('user')->with('edit','Data berhasil diubah!');
    // }

    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('users')->where('id',$id)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);

        return redirect('user')->with('hapus','Data berhasil dihapus!');
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

        return redirect('user/bin')->with('status','Data berhasil di-restore!'); 

    }

    public function deleteperm($id = null)
    {
        if($id != null){
            $users = User::onlyTrashed()->where('id', $id)->forceDelete();
        }else {
            $users = User::onlyTrashed()->forceDelete();
        }

        return redirect('user/bin')->with('status','Data berhasil dihapus permanen!');
    }

}
