<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $branches=Branch::all();
        return view('telefono',compact('branches'));
    }   

    public function edit(Request $request,Branch $branch){
        $this->validate(request(),[
            'phone'=>'required'
        ]);
        $branch->update(['phone'=>$request->phone]);
        return redirect()->route('phones.edit');
    }

    public function getPhones(){
        $phones=[
            'phone1'=>Branch::find(1)->phone,
            'phone2'=>Branch::find(2)->phone,
            'phone3'=>Branch::find(3)->phone,
        ];
        return response()->json($phones, 200);
    }

}
