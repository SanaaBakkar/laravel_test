<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('login');
	}
	
	//Verify input from database 
	
	public function verify(Request $req)
	{
		$username = $req->input('username');
        $password = $req->input('password');
		
		$checkLogin = DB::table('user')->where(['username'=>$username,'password'=>$password])->get();
        if(count($checkLogin) >0)
		{  
			return view('dynamic_dependent');
			
		}else{
			echo "Login Failed Wrong Data Passed";

		}
	}
	
	
	
	

	

}
