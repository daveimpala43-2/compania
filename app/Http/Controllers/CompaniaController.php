<?php

namespace App\Http\Controllers;

use App\Models\compania;
use Illuminate\Http\Request;
use App\Http\Requests\CompaniaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compañiaData=DB::table('compañias')->where('deleted_at','=',null)->get();
        return view('admin.compania.index', ['compañiaData'=>$compañiaData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.compania.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniaRequest $request)
    {

        $compañiaData = request()->except('_token');
        try{
            if($request->hasFile('logo')){
                $compañiaData['logo'] = $request->file('logo')->store('logos','public');
            }
    
            compania::create($compañiaData);
            return redirect()->back()->with('success','Se registro exitosamente');
            
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error','Ocurrio un error, vuelva a intentarlo');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function show(compania $compania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compañiaData = compania::findOrFail($id);
        return view('admin.compania.edit',['compañia' => $compañiaData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compañiaData = request()->except(['_token','_method']);

        $compania = compania::findOrFail($id);

        if($compania->email != $compañiaData['email']){

            $validarData = \Validator::make($request->all(),[
                'email' => 'required|max:75|unique:compañias',
            ]);

            if($validarData->fails()){
                return redirect()->back()->withInput()->withErrors($validarData->errors());
            }
        }

        $validarData = \Validator::make($compañiaData,[
            'nombre' => 'required|string|max:50|min:3',
            'website' => 'required',
        ]);

        if($validarData->fails()){
            return redirect()->back()->withInput()->withErrors($validarData->errors());
        }
        
        try{
            if($request->hasFile('logo')){

            Storage::delete('public/'.$compania->logo);

            $compañiaData['logo'] = $request->file('logo')->store('logos','public');
            }
            compania::where('id','=', $id)->update($compañiaData);
            return redirect()->back()->with('success','Se actualizo corrertamente');
        }
        catch(\Illuminate\Database\QueryException $e){
            
            return redirect()->back()->with('error','Ocurrio un error, vuelva a intentarlo');
        }
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $compañiaData = request()->except('_token');
        $compania = compania::findOrFail($id);
        try{
            
            Storage::delete('public/'.$compania->logo);
            compania::destroy($id);

            return redirect()->back()->with('success','Se elimino exitosamente');
            
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error','Ocurrio un error, vuelva a intentarlo');
        }
    }
}
