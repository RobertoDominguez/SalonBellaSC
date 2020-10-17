<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReserveController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['store','horasReservadas']); 
    }

    public function sucursal1(){
        $hoy = Carbon::now();
        $fecha= $hoy->toDateString(); 
        $reserves=Reserve::where('id_branch','1')->where('date',$fecha)->get();
        return view('reservas_principal',compact('reserves'));
    }

    public function sucursal2(){
        $hoy = Carbon::now();
        $fecha= $hoy->toDateString(); 
        $reserves=Reserve::where('id_branch','2')->where('date',$fecha)->get();
        return view('reservas_centro',compact('reserves'));
    }

    public function sucursal3(){
        $hoy = Carbon::now();
        $fecha= $hoy->toDateString(); 
        $reserves=Reserve::where('id_branch','3')->where('date',$fecha)->get();
        return view('reservas_centenario',compact('reserves'));
    }

    ////apis
    public function store(Request $request){
        $service=Service::find($request->id_service);

        $datos=[
            'client_name'=>$request->client_name,
            'service_name'=>$service->name,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time'=>$request->time,
            'id_service'=>$request->id_service,
            'id_branch'=>$request->id_branch
        ];

       $reserve=Reserve::create($datos);
       return response()->json($reserve, 200); 
    }

    public function horasReservadas(Request $request){

        $reserves=Reserve::join('branches','reserves.id_branch','branches.id')
        ->where('branches.id',$request['0']['id_branch'])
        ->where('date',$request['0']['date'])->select(DB::raw('time,count(*)'))->groupBy('time')
        ->having('count(*)','>','2')->get();

        return response()->json($reserves, 200);
    }


}
