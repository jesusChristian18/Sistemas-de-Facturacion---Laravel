<?php

namespace App\Http\Controllers;

use App\Ropa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RopaController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $datos['ropa']=Ropa::paginate(5);

        return view('ropa.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        return view('ropa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosRopa = request()->all();

        $datosRopa = request()->except('_token');

        if($request->hasFile('Foto')){

            $datosRopa['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Ropa::insert($datosRopa);
        //return response()->json($datosRopa);
        return redirect('ropa')->with('Mensaje','Producto agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ropa  $ropa
     * @return \Illuminate\Http\Response
     */
    public function show(Ropa $ropa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ropa  $ropa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ropa = Ropa::findOrFail($id);

        return view('ropa.edit',compact('ropa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ropa  $ropa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosRopa = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){

            $ropa = Ropa::findOrFail($id);

            Storage::delete('public/'.$ropa->Foto);

            $datosRopa['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Ropa::where('id','=',$id)->update($datosRopa);

        //$ropa = Ropa::findOrFail($id);

        //return view('ropa.edit',compact('ropa'));

        return redirect('ropa')->with('Mensaje','Producto Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ropa  $ropa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $ropa = Ropa::findOrFail($id);

       if( Storage::delete('public/'.$ropa->Foto)){
           Ropa::destroy($id);
       };



       return redirect('ropa')->with('Mensaje','Producto Eliminado con exito');
    }
}
