<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        
        return view('admin.dashboard');
    }

    public function dataDashboard(){
        return $empleados=DB::table('compañias as compa')
        ->join('empleados as emple', 'emple.compañia_id', '=','compa.id')
        ->select(['compa.nombre as label',DB::raw('count(*) as empleado_cout')])
        ->groupBy('compa.nombre')
        ->get();
    }
}
