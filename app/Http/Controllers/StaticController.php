<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certificate;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index($lang){
        $sliders = Slider::all();
        $abouts = About::latest()->first();
        $products = Product::latest()->take(3)->get();
        return view ('website.home.index', compact('sliders','abouts','products'));
    }
    public function about($lang){
        $abouts = About::all();
        return view ('website.about.index',compact('abouts'));
    }
    public function product($lang){
        return view ('website.product.index');
    }
    public function showproduct($lang,$product){
        return view ('website.product.show');
    }
     public function contact($lang){
        return view ('website.contact.index');
    }
    public function blog($lang){
        return view('website.blog.index');
    }
    public function showblog($lang,$blog){
        return view('website.blog.show');
    }
    public function Certificate($lang){
        $certificates = Certificate::all();
        return view('website.Certificate.index',compact('certificates'));
    }
    public function showcertificate($lang,$certificate){
        return view('website.certificate.show');
    }
    public function howitswork($lang){
        return view('website.howitswork.index');
    }
    public function feedback($lang){
        return view('website.feedback.index');
    }

}
