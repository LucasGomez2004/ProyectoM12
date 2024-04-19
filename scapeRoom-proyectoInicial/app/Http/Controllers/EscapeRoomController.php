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

        $escaperoom = $scapesRoomFilter->simplePaginate(5);

        return view('escaperoom.list' , ['escaperoom' => $escaperoom]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $escaperoom = new EscapeRoom;
            $escaperoom->name = $request->name;
            $escaperoom->location_id = $request->location_id;

            $escaperoom->save();

        return redirect()->route('escaperoom.list')->with('status', 'Nou escaperoom '.$escaperoom->name.' creat!');
        }
        $locations = Location::all();
        return view('escaperoom.new', ['locations'=>$locations]);
    }


    function edit(Request $request, $id) 
    {
        $escaperoom = EscapeRoom::find($id);
        
        if ($request->isMethod('post')) {
        $escaperoom = EscapeRoom::find($id);

        $escaperoom->name = $request->name;
        $escaperoom->location_id = $request->location_id;
        $escaperoom->save();

        return redirect()->route('escaperoom.list')->with('status', 'escaperoom '.$escaperoom->name.' modificat!');
    }
    $locations = Location::all();
    return view('escaperoom.edit', ['escaperoom' =>$escaperoom, 'locations'=>$locations]);
    }

    function delete($id) 
    { 
        $escaperoom = EscapeRoom::find($id);
        $escaperoom->delete();

        return redirect()->route('escaperoom.list')->with('status', 'escaperoom '.$escaperoom->name.' eliminat!');
    }
}