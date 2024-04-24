<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;


class LocationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $locationsFilter = Location::where('name', 'LIKE', '%'.$filterValue.'%');

        $locations = $locationsFilter->paginate(5);

        return view('location.list' , ['locations' => $locations]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $location = new Location;
            $location->name = $request->name;

            $location->save();

        return redirect()->route('location.list')->with('status', 'Nuevo Localidad '.$location->name.' Creado!');
        }
        return view('location.new');
    }

    function edit(Request $request, $id) 
    {
        if ($request->isMethod('post')) {
        $location = Location::find($id);

        $location->name = $request->name;

        $location->save();

        return redirect()->route('location.list')->with('status', 'Localidad '.$location->name.' Modificado!');
    }
    $location = Location::find($id);
    return view('location.edit', ['location'=>$location]);
    }

    function delete($id) 
    { 
        $location = Location::find($id);
        $location->delete();

        return redirect()->route('location.list')->with('status', 'Localidad '.$location->name.' Eliminado!');
    }

}