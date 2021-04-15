<?php
namespace App\Http\Controllers\catalog\category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\catalog\common\CartController;
use App\Http\Controllers\catalog\common\HeaderController;
use App\Http\Controllers\catalog\common\FooterController;
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect,Response;

class ProductController extends Controller {
/**
* Display page of the product by product id.
*
* @param int $id, product id
*/	
  public function index($id) {
    $header = new HeaderController;
    $footer = new FooterController;

    $data = array();
		$product = $this->getProductById($id);
    if($product) { 
	    $data['product'] = $product;
	    $data['product']['price'] = number_format($product["price"],2,",","")."&euro;";

	    if($product['special']) {
	    	$data['product']['special'] = number_format($product["special"],2,",","")."&euro;";
	    }

	    $data['header'] = $header->index();
	    $data['footer'] = $footer->index();
	    return view('product', $data);
    } else {
    	return view('404');
    }
  }

  public function getProductById($id) {
    $m_product = new Product;
    $data = array();
		$product = $m_product->get($id);

    if($product) {
	    $data = array(
	    	"product_id"  => $product["product_id"],
	    	"name"        => $product["name"],
	    	"image"       => PATH_IMAGE.$product["image"],
	    	"mark"        => $product["mark"],
	    	"price"       => $product["price"],
	    	"special"     => $product["special"],
	    	"images"      => $product["images"],
	    	"description" => $product["description"]
	    ); 

	    return $data;
    } 
  }

  public function addCart(Request $request){
    if(request()->ajax()) {
    	$product_id = request()->product_id;
    	$quantity = request()->quantity;
    	$product = $this->getProductById($product_id);
    	$price = (float)$product["special"]?$product["special"]:$product["price"];
    	$total = $price * (int)$quantity;

    	$data = array(
    		"product_id"  => $product_id,
    		"name"    		=> $product["name"],
    		"quantity"    => $quantity,
    		"image"       => $product["image"],
    		"price"       => $price,
    		"total"       => $total
    	);

    	$cart = new CartController;
    	$cart->add($data);
			return Response::json($data);
    } else {
    	return Response::json(array("error"=>"No product data!"));
    }
	}

  public function removeCart(Request $request){
    if(request()->ajax()) {
    	$cart_id = request()->cart_id;
    	$cart = new CartController;
    	$cart->remove($cart_id);
			return Response::json($cart_id);
    } else {
    	return Response::json(array("error"=>"cannt find cart_id!"));
    }
	}
}
