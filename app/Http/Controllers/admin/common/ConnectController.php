<?php
namespace App\Http\Controllers\admin\common;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\common\HeaderController;
use App\Http\Controllers\admin\common\FooterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Redirect,Response;

class ConnectController extends Controller {
	private $error = array();
	private $user_id;
/**
* Display page login
* Receive username and password
* @param Request $request
*/	
  public function index(Request $request) {
    $header = new HeaderController;
    $footer = new FooterController;
    $user_id = session()->get('user_id');

    if (request()->method() == "POST") {
    	$user = $request->all(); 
    	if($user) {
    		$this->error = $this->valideUser($user);
    	} 

    	if(!$this->error) {
    		session()->put('user_id', $this->user_id);
    		return redirect()->route('list.product');
    	}
    }

    $data = array();
    $data['header'] = $header->index();
    $data['footer'] = $footer->index();
    $data['error']  = $this->error;
    $data['action'] = route("connect");
    return view('login', $data);
  }

/**
* Disconnect
*
*/
  public function logOut() {
  	session()->forget('user_id');
  	return redirect()->route("connect");
  }

/**
* Valide username and password
* 
* @param array $user
* @return array $error
*/
  public function valideUser($user) {
  	$error = array();
  	if (!$user["username"]) {
	    $error["username"] = "Username is empty!";
  	}
  	if (!$user["password"]) {
	    $error["password"] = "Password is empty!";
  	}
  	if(!$error) {
  		$user_query = DB::select('SELECT * FROM spt_user 
  			WHERE username = ? 
  			AND password = ?', [$user["username"], md5($user["password"])]);

			if ($user_query) {
				$this->user_id = $user_query[0]->user_id;
			} else {
				$error["password"] = "Incorrect username or password";
			}
  	}
		return $error;
  }
}
