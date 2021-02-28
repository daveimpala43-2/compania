<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadosRequest;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        //
        $empledosData= empleados::all()->where('deleted_at','=',null);
        return view('admin.empleados.index',['empleados' => $empledosData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $compañiaData=DB::table('compañias')->select(['id','nombre'])->where('deleted_at','=',null)->get();
        return view('admin.empleados.add',['compañias' => $compañiaData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosRequest $request)
    {
        //
        $empledoData = request()->except('_token');
        try{
    
            empleados::create($empledoData);
            return redirect()->back()->with('success','Se registro exitosamente');
            
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error','Ocurrio un error, vuelva a intentarlo');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $empleadoData = empleados::findOrFail($id);
            $compañiaData=DB::table('compañias')->select(['id','nombre'])->where('deleted_at','=',null)->get();
    
            return view('admin.empleados.edit',['empleado' => $empleadoData, 'compañias'=>$compañiaData]);
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()-with('error','Ocurrio algo al cargar el empleado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadosRequest $request, $id)
    {
        //
        $empleadoData = request()->except(['_token','_method']);
        try{
            empleados::where('id','=', $id)->update($empleadoData);
            return redirect()->back()->with('success','Se actualizo corrertamente');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()-with('error','Ocurrio algo al cargar el empleado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleadoData = request()->except('_token');
        try{
            
            empleados::destroy($id);

            return redirect()->back()->with('success','Se elimino exitosamente');
            
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error','Ocurrio un error, vuelva a intentarlo');
        }
    }
}
