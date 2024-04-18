<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;


class ServiceController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(){
        $services = Service::all();

        return view('services.list' , ['services' => $services]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role_id = 2;

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
        $user->password = $request->password;

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

    function profile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

}