<?php

namespace Tests\Unit;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Http\Controllers\catalog\category\ProductController;
use App\Http\Controllers\catalog\common\CartController;
use App\Http\Controllers\admin\common\HeaderController;

class addCartTest extends TestCase {
  /**
   * Test add a product to cart
   *
   * @return void
   */
  public function testAddCart() {
		$o_product = new ProductController;
		
		// get a product, product_id = 1
		$product = $o_product->getProductById(1);
    $this->assertFalse(empty($product));

    // add this product to cart
    $data = array(
  		"product_id"  => $product["product_id"],
  		"name"    		=> $product["name"],
  		"quantity"    => 1,
  		"image"       => $product["image"],
  		"price"       => $product["price"],
  		"total"       => (float)$product["price"]*1
  	);
	  $o_cart = new CartController;
  	$o_cart->add($data);
  	$cart = $o_cart->getCart();
  	$this->assertTrue(!empty($cart));

  	// remove first product from cart
  	if($cart) {
  		$o_cart->remove(0);
  		$cart = $o_cart->getCart();
  		print_r($cart);
  		$this->assertTrue(empty($cart));
  	}
  }
}
