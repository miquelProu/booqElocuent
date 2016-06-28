<?php namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class CataloguesController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show a list of all of the application's users.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogues = DB::table('catalogue')->get();

		return view('catalogues', ['catalogues' => $catalogues, 'menu' => 'catalogues']);
	}
}