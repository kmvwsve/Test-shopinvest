<?php

namespace App\Http\Controllers\catalog\common;
use App\Http\Controllers\Controller;
use App\Http\Controllers\catalog\common\CartController;

class HeaderController extends Controller {
  public function index() {

    $cart = new CartController;
  	$data = array();
  	$data["cart"] = $cart->index();

    return view('header', $data);
  }
}
