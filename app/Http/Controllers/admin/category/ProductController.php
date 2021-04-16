<?php
namespace App\Http\Controllers\admin\category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\common\HeaderController;
use App\Http\Controllers\admin\common\FooterController;
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect,Response;

class ProductController extends Controller {

/**
* Display list of product.
*
*/	
  public function index() {
    $header  = new HeaderController;
    $footer  = new FooterController;

    $data = array();
		$data["products"] = $this->getProducts();
    $data['header'] = $header->index();
    $data['footer'] = $footer->index();
    return view('product_list', $data);
  }

/**
* Add/Update a product by Method 'POST'
* If 'GET' product_id, mode edit, else mode add.
*
* @param Request $request
* @return array
*/
  public function editProduct(Request $request) {
    $header = new HeaderController;
    $footer = new FooterController;
    $product_id = 0;
    $data = array();
    $data["product"] = array(
    	"name"        => "",
    	"description" => "",
    	"image"       => "",
    	"mark_id"     => 0,
    	"quantity"    => 0,
    	"price"       => 0,
    	"special"     => 0,				
    	"image_additional" 	=> "",				
    	"sort_order" 	=> "",				
		);

    if (request()->method() == "GET") {
    	$requestData = $request->all();
    	if(isset($requestData["product_id"])){
    		$product_id = $requestData["product_id"];
    		$m_product = new Product;
    		$prouct_tmp = $m_product->get($product_id);
    		$data["product"] = $prouct_tmp;
    		$data["product"]["image_additional"] = implode(",", str_replace(config('constants.PATH_IMAGE'), "", $prouct_tmp["images"]));
    	}
    }

    $data['error'] = $this->errorForm($request);
    if (request()->method() == "POST") {
    	$data["product"] = $request->all();
    	$product_id = $data["product"]["product_id"];
	    if (!$data['error']) {
		    $m_product = new Product;
		    if($product_id) {
		    	$m_product->update( $request->all() );
		    } else {
		    	$m_product->add( $data["product"] );
		    }
				return redirect()->route('list.product');
	    }
    }

	  $data['action'] = route('edit.product');
	  $data['heading_title'] = "Add Product";
	  $data['product_id'] = $product_id;
	  $data['marks'] = $this->getMarks();
	  $data['header'] = $header->index();
	  $data['footer'] = $footer->index();
    return view('product_edit', $data);
  }

/**
* Get all products
*
* @return array
*/
  public function getProducts() {
    $m_product = new Product;
    $data = array();
		$products = $m_product->getAll();
		if($products) {
			foreach ($products as $key => $product) {
				$image = "";
				if ($product->image) {
					$image = config('constants.PATH_IMAGE').$product->image;
				}

				$data[] = array(
		    	"product_id"  => $product->product_id,
		    	"name"        => $product->name,
		    	"image"       => $image,
		    	"mark"        => $product->mark,
		    	"quantity"    => $product->quantity,
		    	"price"       => $product->price,
		    	"special"     => $product->special,				
		    	"view"        => route('view.product', [$product->product_id]),				
		    	"edit"        => route('edit.product', ["product_id"=>$product->product_id]),				
		    	"remove"      => route('remove.product', [$product->product_id]),				
				);
			}
		}
		return $data;
  }

/**
* Remove one product by product id
*
* @param int $product_id
*/
  public function removeProduct($product_id) {
    $m_product = new Product;
    $m_product->remove($product_id);
		return redirect()->route('list.product');
  }

/**
* Remove one product by product id
*
* @return array
*/
  public function getMarks() {
    $m_product = new Product;
    $data = array();
		$marks = $m_product->getMarks();

		if($marks) {
			foreach ($marks as $marks) {
				$data[] = array(
		    	"mark_id"  => $marks->mark_id,
		    	"name"     => $marks->name
		    );
			}
		}
		return $data;
  }

/**
* valide form of page edit product
*
* @param Request $request
* @return array $error
*/
  public function errorForm(Request $request) {
  	$error = array();
  	if ($request->method() == "POST") {
	    $product = $request->all();
	    if(!$product["name"]) {
	    	$error["name"] = "Product's name is empty!";
	    }
	    if(!$product["price"]) {
	    	$error["price"] = "Product's price is empty!";
	    }
	    if((float)$product["price"] < 0 || (float)$product["price"] > 10000) {
	    	$error["price"] = "Price must be enter 0 - 10000!";
	    }
	    if((float)$product["special"] < 0 || (float)$product["special"] > 10000) {
	    	$error["special"] = "Special must be enter 0 - 10000!";
	    } 
	    if((float)$product["quantity"] < 0 || (float)$product["quantity"] > 10000) {
	    	$error["quantity"] = "Quantity must be enter 0 - 10000!";
	    } 
  	}

		return $error;
  }
}
