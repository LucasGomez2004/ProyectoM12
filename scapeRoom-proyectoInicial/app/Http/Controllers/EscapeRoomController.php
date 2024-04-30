<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EscapeRoom;
use App\Models\Location;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class EscapeRoomController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $scapesRoomFilter = EscapeRoom::where('name', 'LIKE', '%'.$filterValue.'%');

        $escaperoom = $scapesRoomFilter->paginate(5);

        return view('escaperoom.list' , ['escaperoom' => $escaperoom, 'filterValue' => $filterValue]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|alpha',
                'location_id' => 'required|exists:location,id',
            ]);

            $escaperoom = new EscapeRoom;
            $escaperoom->name = $request->name;
            $escaperoom->location_id = $request->location_id;

            $escaperoom->save();

        return redirect()->route('escaperoom.list')->with('status', 'Nuevo EscapeRoom '.$escaperoom->name.' Creado!');
        }
        $locations = Location::all();
        return view('escaperoom.new', ['locations'=>$locations]);
    }


    function edit(Request $request, $id) 
    {
        $escaperoom = EscapeRoom::find($id);
        
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|alpha',
                'location_id' => 'required|exists:location,id',
            ]);
            
        $escaperoom = EscapeRoom::find($id);

        $escaperoom->name = $request->name;
        $escaperoom->location_id = $request->location_id;
        $escaperoom->save();

        return redirect()->route('escaperoom.list')->with('status', 'EscapeRoom '.$escaperoom->name.' Modificado!');
    }
    $locations = Location::all();
    return view('escaperoom.edit', ['escaperoom' =>$escaperoom, 'locations'=>$locations]);
    }

    function delete($id) 
    { 
        $escaperoom = EscapeRoom::find($id);
        $escaperoom->delete();

        return redirect()->route('escaperoom.list')->with('status', 'EscapeRoom '.$escaperoom->name.' Eliminado!');
    }
}