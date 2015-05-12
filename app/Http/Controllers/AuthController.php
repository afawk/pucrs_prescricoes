<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $data = [
            'usuario' => $request->input('email'),
            'senha'   => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        }
    }

}