<?php
/**
 * Created by PhpStorm.
 * User: miquel
 * Date: 07/06/2016
 * Time: 17:36
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntranetController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

	}
}