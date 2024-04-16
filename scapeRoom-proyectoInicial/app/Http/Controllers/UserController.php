<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(){
        $users = User::all();

        return view('users.list' , ['users' => $users]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = 2;

            $user->save();

        return redirect()->route('user.list')->with('status', 'Nou User '.$user->name.' creat!');
        }
        return view('users.new');
    }

    function edit(Request $request, $id) 
    {
        if ($request->isMethod('post')) {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.list')->with('status', 'User '.$user->name.' modificat!');
    }
    $user = User::find($id);
    return view('users.edit', ['user'=>$user]);
    }

    function delete($id) 
    { 
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.list')->with('status', 'User '.$user->name.' eliminat!');
    }


}