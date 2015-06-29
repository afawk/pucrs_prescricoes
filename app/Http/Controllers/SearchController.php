<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Business\SearchItens;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		if (!$request->isXMLHttpRequest()) {
			return false;
		}

		if (!$request->input('item') || !$request->input('search')) {
			return response()->json(array('fail' => 'need item and search elements'), 400);
		}

		$busca = [
		    $request->input('item') => $request->input('search'),
		];

		$search = new SearchItens();
		$result = $search->by($busca);

		if (empty($result)) {
			return response()->json(array('fail' => 'item not found'), 400);
		}

		return response()->json($result);
	}
};
