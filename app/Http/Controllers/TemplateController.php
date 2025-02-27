<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index ()
    {
        return view ('frontend.home');
    }

    public function about ()
    {
        return view('frontend.about');
    }

    public function property () 
    {
        return view('frontend.property');
    }

    public function property_single ()
    {
        return view('frontend.property_single');
    }
    
    public function contact () 
    {
        return view('frontend.contact');
    }


}
