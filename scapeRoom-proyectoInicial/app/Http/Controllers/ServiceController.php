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

        $services = $servicesFilter->paginate(5);

        return view('services.list' , ['services' => $services, 'filterValue' => $filterValue]);
    }

    function new(Request $request) 
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => ['required', 'regex:/^[\pL\s]+$/u'],
                'description' => 'required|max:255',
                'price' => 'required|numeric',
            ]);

            $service = new Service;
            $service->name = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;

            $service->save();

        return redirect()->route('service.list')->with('status', 'Nuevo Servicio '.$service->name.' Creado!');
        }
        return view('services.new');
    }

    function edit(Request $request, $id) 
    {
        if ($request->isMethod('post')) {
        $service = Service::find($id);

        $request->validate([
            'name' => ['required', 'regex:/^[\pL\s]+$/u'],
            'description' => 'required|max:255',
            'price' => 'required|numeric',
        ]);
        
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        $service->save();

        return redirect()->route('service.list')->with('status', 'Servicio '.$service->name.' Modificado!');
    }
    $service = Service::find($id);
    return view('services.edit', ['service'=>$service]);
    }

    function delete($id) 
    { 
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('service.list')->with('status', 'Servicio '.$service->name.' Eliminado!');
    }

}