<?php
namespace App\Http\Controllers\catalog\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response;

class CartController extends Controller {

/**
* Display cart HTML.
*
*/
	public function index() {
		$cart = $this->getCart();
		$data = array();
		$totalAll = 0;
		$quantityAll = 0;
		if($cart) {
			foreach ($cart as &$crt) {
				$totalAll+=$crt["total"];
				$quantityAll+=$crt["quantity"];
				$crt["price"] = number_format($crt["price"],2,",","")."&euro;";
				$crt["total"] = number_format($crt["total"],2,",","")."&euro;";
			}
		}
		$data["cart"] = $cart;
		$data["totalAll"] = number_format($totalAll,2,",","")."&euro;";
		$data["quantityAll"] = $quantityAll;
		return view('cart', $data);
	}

/**
* @return array $this->index() HTML of the cart
*
*/
	public function loadCart(Request $request){
		return $this->index();
	}

/**
* Get the content of session cart
*
*/
	public function getCart(){
		return session()->get('cart');
	}

/**
* Add product(s) to session cart
*
*/
	public function add($data){
		$cart = $this->getCart();
		$cart[] = $data;
		session()->put('cart', $cart);
	}

	// TO DO...
	public function update(){}


/**
* Add product(s) to cart
*
*/
	public function remove($cart_id){
		$cart = $this->getCart();
		if(isset($cart[$cart_id])) unset($cart[$cart_id]);
		session()->put('cart', $cart);
	}

/**
* Remove all products of cart
*
*/
	public function clear(){
		session()->forget('cart');
	}
}

?>