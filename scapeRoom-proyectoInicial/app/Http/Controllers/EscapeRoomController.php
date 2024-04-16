<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EscapeRoom;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class EscapeRoomController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(){
        $escaperoom = EscapeRoom::all();

        return view('escaperoom.list' , ['escaperoom' => $escaperoom]);
    }

    
}