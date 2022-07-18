<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $title = "Hi, Vlada!";
        // return view('pages.dashboard', compact('title'));
        return view ('pages.dashboard') -> with ('title', $title); 
    }
    public function index(){
        $title = "Welcome to YouCan landing page :)";
        // return view('pages.index', compact('title'));
        return view ('pages.index') -> with ('title', $title); 
    }
    public function about(){
        $title = "This is About Us page";
        return view('pages.about') -> with ('title', $title);
    }
    public function services(){
        $data = array(
            'title' => 'Services'
        );
        return view('pages.services')-> with ($data);
    }

}
