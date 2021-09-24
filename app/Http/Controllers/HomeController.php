<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Post;
use App\User;
use App\Payout;
use App\Setting;
use App\Category;
use App\Ambassador;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BinshopsBlog\Models\BinshopsPost;
use BinshopsBlog\Models\BinshopsPostTranslation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    public function index()
    {
        $categories = Category::withCount('products')->whereStatus(1)->get()->random(3);
      
        $plans = Plan::whereStatus(1)->get();

        $ambassadors = Ambassador::whereStatus('1')->get();
        $testimonials = Testimonial::whereStatus('1')->get();
         
        return view('welcome', compact( 'categories', 'plans', 'ambassadors', 'testimonials'));
    }


    public function contact()
    {           
        return view('contact');
    }

    public function faq()
    {           
        return view('faq');
    }

    public function about()
    {           
        return view('about');
    }

}
