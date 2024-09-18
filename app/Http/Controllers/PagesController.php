<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function about(){
        $about = "Welcome to about section";
        // return view('pages.index', compact('title'));
        return view('pages.about')->with('title', $about);
    }

    public function services(){
        $array = array(
            "title" => "Welcome to Services section",
            "services" => array("Customer", "Delivery", "Accounting")
        );
        return view('pages.services') -> with($array);
    }
}
