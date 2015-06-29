<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller {

	/**
	 * @return view
	 */
	public function index()
	{
		if (Auth::check()) {
			return redirect()->intended('/');
		}

		return view('auth.index');
	}

	/**
	 * @return redirect
	 */
	public function create(Request $request)
	{
		$data = [
			'usuario'  => $request->input('userinpt'),
			'password' => $request->input('pssinpt'),
		];

		if (Auth::attempt($data)) {
			return redirect()->intended('/');
		} else {
			return redirect()->back()
				->withInput()
				->with('alert', 'Usuário e / ou senha inválido');
		}
	}

	/**
	 * @return redirect
	 */
	public function destroy()
	{
		Auth::logout();
		return redirect()->intended('/');
	}

}
