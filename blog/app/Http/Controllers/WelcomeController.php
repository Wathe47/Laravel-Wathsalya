<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   private static $name = "Wathsalya";

    public function show ()
    {
      return view('welcome',['name'=> self::$name]);
    }

    public function showAPI(){
      return response()->json(['name'=> self::$name]);
    }

}
