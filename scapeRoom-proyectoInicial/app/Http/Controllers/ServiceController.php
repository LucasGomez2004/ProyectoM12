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

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $servicesFilter = Service::where('name', 'LIKE', '%'.$filterValue.'%');

        $services = $servicesFilter->simplePaginate(5);

        return view('services.list' , ['services' => $services]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {
            $service = new Service;
            $service->name = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;

            $service->save();

        return redirect()->route('service.list')->with('status', 'Nou Service '.$service->name.' creat!');
        }
        return view('services.new');
    }

    function edit(Request $request, $id) 
    {
        if ($request->isMethod('post')) {
        $service = Service::find($id);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        $service->save();

        return redirect()->route('service.list')->with('status', 'Service '.$service->name.' modificat!');
    }
    $service = Service::find($id);
    return view('services.edit', ['service'=>$service]);
    }

    function delete($id) 
    { 
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('service.list')->with('status', 'Service '.$service->name.' eliminat!');
    }

}