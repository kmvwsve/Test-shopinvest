<?php

namespace App\Http\Controllers\admin\common;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\common\ConnectController;
use Illuminate\Support\Facades\Route;
use Redirect;

class HeaderController extends Controller {

/**
* Get user_id from session
* If user is not login then redirect to the page login. 
*
*/
  public function index() {
  	$currentRoute = Route::currentRouteName();

  	if($currentRoute != "connect") {
			$user_id = session()->has('user_id');
	    if(!$user_id) {
	    	return redirect()->route('connect');
	    }
  	}
    return view('header_admin', ["logout"=>route("logout.admin")]);
  }
}
