<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role.index')->withRole($role);
    }

    public function create()
    {
        $permission = Permission::all();
        return view('role.create')->withPermission($permission);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required'
        ));

        if(Role::where('name','=',Input::get('name'))->count() > 0 ){
            dd("role name exist");
        }else{
            $role = new Role;
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;

            if($role->save()){
                if($role->perms()->sync($request->permission, false))
                {
                    return redirect('role');
                    //dd("berhasil simpan role");
                }
                dd("gagal simpan role permission");
            }
            dd("gagal simpan role");
        }
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit')->withRole($role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $this->validate($request, array(
            'name' => 'required'
        ));

        if(Role::where('name','=',Input::get('name'))->count() > 0 ){
            dd("role name exist");
        }else{
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;

            if($role->save()){
                dd("berhasil update role");
            }
            dd("gagal update role");
        }
    }

    public function delete($id)
    {
        // $role = Role::findOrFail($id);
        $role = Role::whereId($id)->delete();
        if($role)
        {
            //$role->perms()->detach();
            return redirect('role');
        }
        dd('dd');
    }
}
