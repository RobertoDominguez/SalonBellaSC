<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $products=Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'image'=>'required',
        ]);

        $datos=[
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'link_image'=>'',
        ];

        if ($request->has('image')) {
            $datos['link_image'] = $request->image->store('products');
        }

        $producto=Product::create($datos);

        return redirect()->route('products.index')->with('success','Producto ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
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

        if (!is_null($request->image)) {
            Storage::delete($product->image);
            $datos['link_image'] = $request->image->store('products');
        }

        $product->update($datos);

        return redirect()->route('products.index')->with('success','Producto ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success','Producto ha sido eliminado');
    }


    //api
    public function all(){
        $products=Product::all();
        return response()->json($products, 200);
    }



}
