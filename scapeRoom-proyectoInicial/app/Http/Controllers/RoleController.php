<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;


class RoleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $rolesFilter = Role::where('name', 'LIKE', '%'.$filterValue.'%');

        $roles = $rolesFilter->simplePaginate(5);

        return view('role.list' , ['roles' => $roles]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $role = new Role;
            $role->name = $request->name;

            $role->save();

        return redirect()->route('role.list')->with('status', 'Nuevo Rol '.$role->name.' Creado!');
        }
        return view('role.new');
    }

    function edit(Request $request, $id) 
    {
        if ($request->isMethod('post')) {
        $role = Role::find($id);

        $role->name = $request->name;

        $role->save();

        return redirect()->route('role.list')->with('status', 'Rol '.$role->name.' modificat!');
    }
    $role = Role::find($id);
    return view('role.edit', ['role'=>$role]);
    }

    function delete($id) 
    { 
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('role.list')->with('status', 'Rol '.$role->name.' eliminat!');
    }

}