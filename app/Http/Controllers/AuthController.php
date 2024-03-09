<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class AuthController extends Controller
{
    public function page(){
      
        return view("login");
    }
    
    public function auth(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
     if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
           return Redirect::to('http://localhost:8000');
        }else{
            echo "Error";
        }
    }
    
    public function diconnectAuth(){
        if(Auth::check()){
             Auth::logout();
         return Redirect::to('http://localhost:8000');
        }else{
             echo json_encode(array("ans"=>"Need to Have AUTH ON"));
        }
       
    }
}
