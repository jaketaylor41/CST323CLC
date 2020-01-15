<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        
        // create business service object
        // call login method with creddentials as parameters
        // business method creates data access object
        // business method calls dao login method with credentials as parameters
        // dao login method validates user with database
        // returns true if valid, false if not
        // business method sets session if true
        // this controller returns home page if logged in, login page if not logged in
        
        
        return view('home');
    }
    
    public function register(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $password = $request->input('password');
        
        // business method for register
        
        return view('login');
    }
    
}
