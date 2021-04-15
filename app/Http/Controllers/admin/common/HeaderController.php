<?php

namespace App\Http\Controllers\admin\common;
use App\Http\Controllers\Controller;

class HeaderController extends Controller {
  public function index() {
    return view('header_admin');
  }
}
