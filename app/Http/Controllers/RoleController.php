<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function role()
    {
        $role = DB::table('role')->where('deleted_at',null)->get();
        return view('tables.role',['role' => $role]);
    }

    public function store(Request $request)
    {      
        $request ->validate([
            'role' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);
        
        DB::table('role')->insert([
            'role' => $request->role,
        ]);

        return redirect('role')->with('tambah','Data berhasil ditambah!');    
    }
    
    public function edit(Request $request, $id_role)
    {
        $request ->validate([
            'role' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s\.]*$/',
        ]);

        if($request->isMethod('post')){

            $p = $request->all();

            Role::where(['id_role'=>$id_role])->update([
                'role'=>$p['role'],
            ]);

            return redirect()->back()->with('edit','Data behasil diubah!');

        }
    }

    // public function edit($id)
    // {     
    //     $role= DB::table('role')->where('id_role',$id)->get();          
    //     return view('form edit.roleedit',['role' => $role]);
    // }   

    // public function update(Request $request){
    //     DB::table('role')->where('id_role',$request->id)->update([
    //         'role' => $request->role
    //     ]);
    //     return redirect('/role');
    // }

    public function delete($id_role)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('role')->where('id_role',$id_role)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);

        return redirect('role')->with('hapus','Data berhasil dihapus!');
    }
    
    public function bin()
    {
        $role = Role::onlyTrashed()->get();
        return view('bin.rolebin', ['role' => $role]);
    }

    public function restore($id_role = null)
    {
        if($id_role != null){
            $role = Role::onlyTrashed()->where('id_role', $id_role)->restore();
        }else {
            $role = Role::onlyTrashed()->restore();
        }

        return redirect('role/bin')->with('status','Data berhasil di-restore!'); 

    }

    public function deleteperm($id_role = null)
    {
        if($id_role != null){
            $role = Role::onlyTrashed()->where('id_role', $id_role)->forceDelete();
        }else {
            $role = Role::onlyTrashed()->forceDelete();
        }

        return redirect('role/bin')->with('status','Data berhasil dihapus permanen!');
    }
}
