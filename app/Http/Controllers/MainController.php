<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
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
		$booqs = DB::table('booq')
		           ->join('booq_type', 'booq.ty_id', '=', 'booq_type.ty_id')
			       ->join("booq_category", "booq.bq_category", "=", "booq_category.id")
		           ->select('booq.*', 'booq_type.ty_type', "booq_category.category")
				   ->orderBy('booq.bq_pub_date', 'desc')
		           ->get();

		return view('main', ['booqs' => $booqs, 'menu' => 'home']);
	}

//	public function detail_OLD(Request $request, $id)
//	{
//		$booq = DB::table("booq")
//					->join("cover_type", "booq.co_id", "=", "cover_type.co_id")
//					->where("booq.bq_id", $id)
//					->select("booq.*", "cover_type.co_type")
//					->first();
//		$isbns = DB::table("isbn")->where("id_booq", $id)->get();
//
//		$isOld = ($booq->bq_pub_date < new \DateTime('now'));
//
//		$haveInteriors = (DB::table("interior_image")->where("bq_id", $id)->count() > 0);
//
//		$haveShipping =  ($request->session()->has('shipping'));
//
//		if (!$haveShipping) {
//			$shipingCost = 0;
//			$cookie = 0;
//		} else {
//			$cookie = $request->session()->get('shipping');
//			$shipingCost = 10;
//			if ($cookie == "1" || $cookie == "2" || $cookie == "3") {
//				$shipingCost = 5;
//			}
//		}
//
//		$shipingOpt = array ('Please, select region',
//			'Spain:  5€ each book',
//			'EU: 5€ + 5€ for each book',
//			'Rest of Europe: 10€ + 5€ for each book',
//			'Rest of the World: 15€ + 10€ for each book');
//
//		return view('detail', ['booq' => $booq,
//		                       'isbns' => $isbns,
//		                       'isOld' => $isOld,
//		                       'haveInteriors' => $haveInteriors,
//		                       'haveShipping' => $haveShipping,
//								'lang' => substr($request->getLanguages()[0],0,2),
//		                       'shipingOpt' => $shipingOpt,
//		                       'shipingCost' => $shipingCost,
//		                       'shippingVal' => $cookie]);
//	}

	public function detail(Request $request, $id)
	{
		$booq = DB::table("booq")
		          ->join("cover_type", "booq.co_id", "=", "cover_type.co_id")
		          ->where("booq.bq_id", $id)
		          ->select("booq.*", "cover_type.co_type")
		          ->first();
		$isbns = DB::table("isbn")->where("id_booq", $id)->get();

		$isOld = ($booq->bq_pub_date < new \DateTime('now'));

		$haveInteriors = (DB::table("interior_image")->where("bq_id", $id)->count() > 0);


		return view('detail', ['booq' => $booq,
		                       'isbns' => $isbns,
		                       'isOld' => $isOld,
		                       'haveInteriors' => $haveInteriors]);
	}

	public function inside($id)
	{
		$inside = DB::table('interior_image')
					  ->where('bq_id', $id)
					  ->get();

		return view('inside', ['inside' => $inside]);
	}

	public function setShipping(Request $request, $value){
		$request->session()->put('shipping', $value);

		$shippingCost = 0;
		if($value == '1'){
			$shippingCost = 5;
		} elseif ($value == '2') {
			$shippingCost = 10;
		} else if ($value == '3') {
			$shippingCost = 15;
		} else if ($value == '4') {
			$shippingCost = 25;
		}
//		$request->session()->put('shippingCost', $shippingCost);

		echo $shippingCost;
	}
}