<?php

namespace App\Http\Controllers;


use App\Session;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller{

    public function index()
    {
        $acessos = array(
            'dia' => DB::table('sessions')->select('*')->whereRaw('EXTRACT(DAY FROM created_at) = EXTRACT(DAY FROM NOW())')->count(),
            'mes' => DB::table('sessions')->select('*')->whereRaw('EXTRACT(MONTH FROM created_at) = EXTRACT(MONTH FROM NOW())')->count(),
            'ano' => DB::table('sessions')->select('*')->whereRaw('EXTRACT(YEAR FROM created_at) = EXTRACT(YEAR FROM NOW())')->count()
        );

        return view('sessions.index', ['acessos' => $acessos]);
    }
}