<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;

class MainController extends Controller {
public function login(Request $request) {
	 //if (Auth::guest()) return Redirect::guest('login');
		$rules = array (
				
				'username' => 'required',
				'password' => 'required' 
		);

		$users2 = DB::table('users')->get();
        if (count($users2) < 1) {
        	$rules = array (
	            'username' => 'required|string|max:255',
	            'password' => 'required|string|min:6',
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			Session::flash ( 'message', "Invalid Password. Minimum of 6 characters. Please try again." );
			return Redirect::back ()->withErrors ( $validator)->withInput ();
		} else {


            $user = new User ();	
			$user->name = "Super User";
			$user->email = "superuser@gmail.com";
			$user->username = $request->get ( 'username' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->remember_token = $request->get ( '_token' );
			$user->status = "1";
			$user->save ();
			 
        if (Auth::attempt ( array (
					
					'username' => $request->get ( 'username' ),
					'password' => $request->get ( 'password' ) 
			) )) {
				session ( [ 
						
						'name' => $request->get ( 'name' ) 
				] );
				//return redirect('home');
	
				
				 $users2 = DB::table('transaction')
		        ->orderby('created_at','desc')
		        ->get();
				return view('home',['users2'=>$users2]);
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ()->withErrors ( $validator)->withInput();
			}
			}
        }
        else {

		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator);
		} else {
			if (Auth::attempt ( array (
					
					'username' => $request->get ( 'username' ),
					'password' => $request->get ( 'password' ) 
			) )) {
				session ( [ 
						
						'name' => $request->get ( 'name' ) 
				] );

				//return redirect('home');
				$users2 = DB::table('transaction')->get();
				return view('home',['users2'=>$users2]);
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ()->withErrors ( $validator)->withInput();
			}
		}
	}
	}
	public function register(Request $request) {
		$rules = array (
				 'name' => 'required|string|max:255',
	            'email' => 'required|string|email|max:255|unique:users',
	            'username' => 'required|string|max:255|unique:users',
	            'password' => 'required|string|min:6|confirmed',
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator)->withInput ();
		} else {
			$user = new User ();
			$user->name = $request->get ( 'name' );
			$user->email = $request->get ( 'email' );
			$user->username = $request->get ( 'username' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->remember_token = $request->get ( '_token' );
			
			$user->save ();
			 Session::flash ( 'message', "User successfully registered." );
        return redirect('home');
		}
	}
	public function logout() {
		//$request->session()->getHandler()->destroy($request->session()->getId());
        Session::flush();
        
        Auth::logout(); // logout user
        return redirect(\URL::previous());
	}
}
