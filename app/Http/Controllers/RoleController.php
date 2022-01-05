<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
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

        Toastr::success('Data role berhasil ditambah','Tambah');
        return redirect()->back();

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

            Toastr::warning('Data role berhasil diubah','Edit');
            return redirect()->back();

        }
    }

    public function delete($id_role)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('role')->where('id_role',$id_role)->update(['DELETED_AT' => date('Y-m-d H:i:s')]);

        Toastr::error('Data role berhasil dihapus','Hapus');
        return redirect()->back();
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
        
        Toastr::info('Data role berhasil direstore','Restore');
        return redirect()->back(); 

    }

    public function deleteperm($id_role = null)
    {
        if($id_role != null){
            $role = Role::onlyTrashed()->where('id_role', $id_role)->forceDelete();
        }else {
            $role = Role::onlyTrashed()->forceDelete();
        }

        Toastr::error('Data role berhasil dihapus secara permanen','Hapus Permanen');      
        return redirect()->back();
    }
}
