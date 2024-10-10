<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Portofolio\Portofolio;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimoni;
use App\Models\step;
use App\Models\benefit;
use App\Models\Partner;
use App\Models\Faq;
use App\Models\daftar;

class HomeController extends Controller
{

    public function __construct(){
        View()->share('menu', 'Home');
    }

    public function index(){
        $data['sliders']       	= Slider::all();
        $data['services']       = Service::take('3')->get();
        $data['portofolio']     = Portofolio::orderby('id','desc')->take('8')->get();
        $data['clients']        = Client::orderby('id','desc')->take('9')->get();
        $data['testimoni']      = Testimoni::all();
        $data['step']           = step::all();
        $data['benefit']        = benefit::all();
        $data['partner']        = Partner::all();
        $data['faq']            = Faq::all();

        return view('website.home.index', $data);
    }

    public function store(Request $request)
    {

        $this->inbox = new daftar();
        // $request->validate([
        //     // 'g-recaptcha-response' => ['required', new ReCaptcha],
        //     'name' => 'required|name'
            
        // ]);

        if ($this->inbox->create($request->all())) {
            return redirect()->route('landing.index')->with(['status' => 'success', 'message' => 'Pesan Anda Sudah Terkirim']);
        }
        return redirect()->route('landing.index')->with(['status' => 'danger', 'message' => 'Gagal, Coba lagi nanti']);
    }
}
