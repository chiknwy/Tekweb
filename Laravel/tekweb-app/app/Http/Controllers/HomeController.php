<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landingpage(){
        $title = "Landing Page";
        $packages = [(object)[
            'package_code'=>'dummy code',
            'package_name'=>'dummy name',
            'package_price'=>'dummy price',
        ],(object)[
            'package_code'=>'dummy code 1',
            'package_name'=>'dummy name 1',
            'package_price'=>'dummy price 1',
        ], (object)[
            'package_code'=>'dummy code 2',
            'package_name'=>'dummy name 2',
            'package_price'=>'dummy price 2',
        ]];
        return view('frontpage.landing', compact('title', 'packages'));

    }

    public function about(){
        $title = "About Page";
        return view('frontpage.about', compact('title'));
    }
    public function marketplace(){
        $title = "Marketplace Page";
        return view('frontpage.marketplace', compact('title'));
    }

    public function features(){
        $title = 'Features Page';
        return view('frontpage.features', compact('title'));
    }
    public function lib(){
        $title = 'Lib Page';
        return view('frontpage.uts', compact('title'));
    }
    // function landingpage ()
    // {
    //     return view('frontpage.landing');
    // }
}
