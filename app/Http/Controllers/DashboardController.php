<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\Upsell;
use App\Product;
use App\Category;
use App\Settings;
use App\Salespage;
use Carbon\Carbon;
use App\BestSeller;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(Auth::user()->level == 2 || Auth::user()->level == 3 || Auth::user()->level == 4){
            $settings = Settings::first();
            $subscribers = User::whereLevel(1)->count();
            $paidSubscribers = User::whereLevel(1)->where('plan_id', '<>', NULL)->count();
            $products = Product::whereStatus(1)->count();
            // dd($subscribers, $paidSubscribers, $products);

            return view('admin.index', compact('subscribers', 'paidSubscribers', 'products'));
         }

         
        if(auth()->user()->level == 1){
            if(auth()->user()->plan_id == null){
                return redirect(url('/selectplans'));
            }
            $categories = Category::withCount(['products' => function($query){
            $query->where('status', 1);
            }])->whereStatus(1)->get();

            $products = Product::with('category')->whereStatus(1)->simplePaginate(50);
            $bestsellers = BestSeller::with('product')->where('order', '<>', null)->orderBy('order', 'ASC')->get();
            
            foreach($products as $product){
               if($product->f_image !== null){
                    $product['main_image'] = json_decode($product->f_image, true)[0];
               }else{
                    $product['main_image'] = pulic_path().'/images/site/comming-soon.jpg';
            }    
           }
   
            return view('users.products', compact('categories', 'products', 'bestsellers'));
        
        }else return abort(404);
    }

    public function categoryFilter($slug){
            
        $categories = Category::withCount(['products' => function($query){
            $query->where('status', 1);
        }])->whereStatus(1)->get();

        $category = Category::with(['products' => function($query){
            $query->where('status', 1);
        }])->whereSlug($slug)->first();
        
        $products = $category->products;
        
       foreach($products as $product){
           if($product->f_image !== null){
                $product['main_image'] = json_decode($product->f_image, true)[0];
           }else{
            $product['main_image'] = pulic_path().'/images/site/comming-soon.jpg';
           }
           
       }    
    

    return view('users.filteredproducts', compact( 'category', 'products', 'categories'));
}


    public function singleProduct($slug){

        $product = Product::with('category')->whereSlug($slug)->first();
        
        $salespage_file = ltrim($product->salespage_file, 'salespage_files/');
        
        // $upsells = json_decode($product->upsell_products);
        $upsells = json_decode($product->upsell_products);
      
        $product['main_image'] = json_decode($product->f_image, true)[0];
        $data_slide = 0;
        $upsell_array = array();

        if(count($upsells) >0 ){
            $upsell_array = array();
         
            foreach($upsells as $upsell){
                $upsells =  Upsell::whereId($upsell)->first();
                array_push($upsell_array, $upsells  );
            }
        }

        foreach($upsell_array as $u){
            if($u->f_images !== null){
                 $u['main_image'] = json_decode($u->f_images, true)[0];
            }
        }
        
        if(!empty(auth()->user()->salespages)){

            $hasRequestedThisMonth = auth()->user()->salespages->whereBetween('created_at', [Carbon::now()->subMonth(1), Carbon::now()])->count();

        }else $hasRequestedThisMonth = 0; 
       
        // dd($hasPreviouslyRequested);
        $isProductHasSalesPage = empty($product->salespage_link)  && empty($product->salespage_file) ? 0 : 1;
        $requestedForCurrentProduct = auth()->user()->salespages->where('product_id', $product->id)->first();
       
        if (isset($requestedForCurrentProduct) && $requestedForCurrentProduct->count() > 0){
           
            return view('users.singleproduct2', compact('isProductHasSalesPage', 'requestedForCurrentProduct', 'product', 'salespage_file', 'upsell_array', 'data_slide'));
        }
      
        return view('users.singleproduct', compact('isProductHasSalesPage', 'hasRequestedThisMonth', 'product', 'salespage_file', 'upsell_array', 'data_slide'));
        
    }

    public function singleCategory($slug){

        $category = Category::whereSlug($slug)->first();
   
        return view('users.singleproduct', compact( 'category'));
    }   

    public function singleUpsell($slug){

        $upsell = Upsell::whereSlug($slug)->first();
   
        return view('users.singleupsell', compact( 'upsell'));
    }
    

    public function upgradePlan($old_plan){
        $plans = Plan::whereStatus(1)->get();
        
        return view('users.upgradeplan', compact( 'old_plan', 'plans'));
    }
    

    public function selectPlans(){

        $plans = Plan::all();
        
        return view('users.selectplans', compact('plans'));
    }
    
    public function checkout(Request $request){

        $plan = Plan::whereId($request->plan)->first();
        
        if($request->price != $plan->mprice && $request->price != $plan->threemprice && $request->price != $plan->sixmprice && $request->price != $plan->twelvemprice){
            return back()->with('error', 'Invalid validity period selected, please select a validity period');
        }

        if($request->price == $plan->mprice){
            $plan['validity'] = 1;
        }elseif($request->price == $plan->threemprice ){
            $plan['validity'] = 3;
        }elseif($request->price == $plan->sixmprice){
            $plan['validity'] = 6;
        }elseif($request->price == $plan->twelvemprice){
            $plan['validity'] = 12;
        }else{
            $plan['validity'] = null;
        }

        $plan['amount'] = $request->price;
        $plan['type'] = $request->type;
        return view('users.checkout', compact('plan'));
    }

    public function updateProfile(){
        return view('users.profile');
    }

    public function submitContact(Request $request){
        
        $data = $this->validate($request, [
            '_answer'=>'required|simple_captcha',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //send email to official email
        Mail::to(Settings::select('official_mail')->first()->value('official_mail'))->send(new ContactEmail($data));

        return back()->with('message', 'Your message has been sent, we will get back to you in a moment');
    }

    public function saveProfile( Request $request){
       
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.auth()->user()->id,
            'phone' => 'required|numeric',
            'password' => 'nullable|min:6',
            'bank_name' => 'nullable',
            'account_name' => 'nullable',
            'account_number' => 'nullable'
        ]);

        //handle password
        if($request['password']){
            $request['password'] = Hash::make($request['password']);
        }else $request['password'] = auth()->user()->password;

        try{
            auth()->user()->update($request->all());
        }catch (\Illuminate\Database\QueryException $ex) {
                $error = $ex->getMessage();        
                return back()->with('error', $ex);
            }

        return back()->with('message', 'Update successful!');

    }
        
    public function PlanInfo(){
        
        return view('users.planprofile')->with('message', 'Payment successfull!');
    }
    
    public function downloadsalespagefile($filename){
        $filename = ltrim($filename, 'salespage_files/'); 
        $realpath = base_path() . '/uploads/salespage_files'. '/' .$filename;
        
        return response()->download($realpath);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}
