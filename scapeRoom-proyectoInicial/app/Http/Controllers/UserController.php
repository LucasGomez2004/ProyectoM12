<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;


class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $usersFilter = User::where('name', 'LIKE', '%'.$filterValue.'%');

        $users = $usersFilter->paginate(5);

        return view('users.list' , ['users' => $users, 'filterValue' => $filterValue]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => ['required', 'regex:/^[\pL\s]+$/u'],
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ], 
            [
                'email.unique' => 'El correo electrónico ya ha sido registrado.', // Aquí puedes personalizar el mensaje de error
            ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role_id = $request->role_id;

            if (isset($request->eliminarimatge)) {
                $filename = $request->avatar;
                File::delete(public_path('uploads/imatges'), $filename);
                $user->avatar = null;
            }if($request->file('avatar')){
                $file = $request->file('avatar');
                $filename = $user->name . "." . $file->extension();
                $file->move(public_path('uploads/imatges'), $filename);
                $user->avatar = $filename;
            }

            $user->save();

        return redirect()->route('user.list')->with('status', 'Nuevo Usuario '.$user->name.' Creado!');
        }
        $roles = Role::all();
        return view('users.new',['roles' => $roles, 'defaultRoleId' => 2]);
    }

    function edit(Request $request, $id) 
    {
        $user = User::find($id);
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => ['required', 'regex:/^[\pL\s]+$/u'],
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

        

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;

        if (isset($request->eliminarimatge)) {
            $filename = $request->avatar;
            File::delete(public_path('uploads/imatges'), $filename);
            $user->avatar = null;
        }if($request->file('avatar')){
            $file = $request->file('avatar');
            $filename = $user->name . "." . $file->extension();
            $file->move(public_path('uploads/imatges'), $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route('user.list')->with('status', 'Usuario '.$user->name.' Modificado!');
    }
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit',['roles' => $roles,'user' => $user]);
    }

    function delete($id) 
    { 
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.list')->with('status', 'Usuario '.$user->name.' Eliminado!');
    }

    function profile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

    public function pdf(){
        $users = User::all();
        $roles = Role::all();
        $pdf = Pdf::loadView('users.pdf', compact('users', 'roles'));
        return $pdf->stream();
    }
}