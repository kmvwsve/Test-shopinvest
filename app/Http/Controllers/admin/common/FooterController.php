<?php

namespace App\Http\Controllers\admin\common;
use App\Http\Controllers\Controller;

class FooterController extends Controller {
  public function index() {
    return view('footer');
  }
}
