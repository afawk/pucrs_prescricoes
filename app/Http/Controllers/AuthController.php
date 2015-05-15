<?php namespace App\Http\Controllers;

use Auth;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller {

	/**
	 * @return view
	 */
	public function index()
	{
		if (Auth::check()) {
			return redirect()->intended('home');
		}

		return view('auth.index');
	}

	/**
	 * @return redirect
	 */
	public function create(Request $request)
	{
		$data = [
			'usuario' => $request->input('userinpt'),
			'senha'   => $request->input('pssinpt'),
		];

		if (Auth::attempt($data)) {
			echo 'oi';
		}
		else {
			echo 'fuu';
		}
	}

	/**
	 * @return redirect
	 */
	public function destroy()
	{
		Auth::logout();
		return redirect()->intended('login');
	}

}
