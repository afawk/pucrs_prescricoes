<?php

namespace App\Http\Controllers;


use App\Session;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller{

    public function index()
    {
        $acessos = array(
            'dia' => DB::table('sessions')->where('created_at', '>=', date('Y-m-d'))->count(),
            'mes' => DB::table('sessions')->where('created_at', '>=', date('Y-m-').'01')->count(),
            'ano' => DB::table('sessions')->where('created_at', '>=', date('Y').'-01-01')->count()
        );

        return view('sessions.index', ['acessos' => $acessos]);
    }
}
