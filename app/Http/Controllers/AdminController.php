<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 

class AdminController extends Controller
{
    public function getadmin(){
     
    	 return view('Admin');

    }

    public function getquantri(){
       
    	 return view('backend.dashboard');

    }
   

}
