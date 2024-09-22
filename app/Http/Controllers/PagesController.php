<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        $data = array(
            "title" => "Welcome to No Longer Laravel",
            "text" => "A place where you can just do stuff... I think.. :D"
        );
        return view('pages.welcome') -> with($data);
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
