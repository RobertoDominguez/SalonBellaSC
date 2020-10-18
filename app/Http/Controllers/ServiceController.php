<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['all']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required',
        ]);

        $datos=[
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'link_image'=>'',
        ];

        if ($request->has('image')) {
            $datos['link_image'] = $request->image->store('services');
        }

        $servicio=Service::create($datos);

        return redirect()->route('services.index')->with('success','Servicio ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate(request(),[
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required',
        ]);

        $datos=[
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
        ];

        if (!is_null($request->image)) {
            Storage::delete($service->image);
            $datos['link_image'] = $request->image->store('services');
        }

        $service->update($datos);

        return redirect()->route('services.index')->with('success','Servicio ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Storage::delete($service->link_image);
        $service->delete();
        return redirect()->route('services.index')->with('success','Servicio ha sido eliminado');
    }



    //api
    public function all(){
        $services=Service::all();
        return response()->json($services, 200);
    }

}
