<?php
/**
 * Created by PhpStorm.
 * User: miquel
 * Date: 07/06/2016
 * Time: 17:43
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Autentificacion extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function formularioLogin()
	{
		return view('auth\login', ['menu' => 'cart']);
	}
} 