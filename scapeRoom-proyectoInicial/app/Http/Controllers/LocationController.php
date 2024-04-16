<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class LocationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function list(){
        $locations = Location::all();

        return view('location.list' , ['locations' => $locations]);
    }

    
}