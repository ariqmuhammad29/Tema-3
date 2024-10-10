<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;



class ContaxtUsController extends Controller
{

    public function __construct(){
        View()->share('ContactUs');
    }

    public function index(){
       
        $data['faq']            = Faq::all();

        return view('website.home.index', $data);
    }
}
