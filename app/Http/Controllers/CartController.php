<?php
/**
 * Created by PhpStorm.
 * User: miquel
 * Date: 25/04/2016
 * Time: 21:44
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
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

	public function index()
	{
		return view('cart',['menu' => 'cart']);
	}

	public function cartDetail(Request $request)
	{
		$carts = null;
		$cart = null;
		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			$ids = array();
			foreach($cart as $item) {
				array_push($ids, $item['id']);
			}

			$carts = DB::table('booq')
			          ->whereIn('bq_id', $ids)
			          ->get();

			$cartISBN = array();
			foreach ($carts as $carro) {
				$isbn = DB::table('isbn')
					->where('id_booq', '=', $carro->bq_id)
					->get();

				$cartISBN[] = $isbn;
			}
		}

		$shipping = 0;
		if ($request->session()->has('shipping')) {
			$shipping = $request->session()->get('shipping');
		}
		$shipingOpt = array ('Please, select region',
			'Spain:  5€ each book',
			'EU: 5€ + 5€ for each book',
			'Rest of Europe: 10€ + 5€ for each book',
			'Rest of the World: 15€ + 10€ for each book');


		return view('cartDetail',['carts' => $carts,
							'cartISBN' => $cartISBN,
							'count' => $cart,
							'shipingOpt' => $shipingOpt,
							'shipping' => $shipping]);
	}

	public function add(Request $request, $id)
	{
		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');

			$flag = false;

			foreach($cart as $i => $item) {
				if (intval($item["id"]) == $id) {
					$cart[$i]["count"] = $cart[$i]["count"] + 1;
					$flag = true;
				}
			}
			if (!$flag) {
				$cart[] = ['id' => $id,
				           'count' => 1];
			}
			$request->session()->put('cart', $cart);
		} else {
			$request->session()->put('cart', array(['id' => $id,
													'count' => 1]));
		}

		return "true";
	}

	public function remove(Request $request, $id)
	{
		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			$delete = -1;
			foreach($cart as $i => $item) {
				if ($item["id"] == $id) {
					$cart[$i]["count"] = $cart[$i]["count"] - 1;
					if ($cart[$i]["count"] == 0) {
						$delete = $i;
					}
				}
			}
			if ($delete >= 0) {
				unset($cart[$delete]);
			}
			$request->session()->put('cart', $cart);
		}

		return "true";
	}

	public function changeShipping(Request $request, $shiping)
	{
		$request->session()->put('shipping', $shiping);

		return "true";
	}
} 