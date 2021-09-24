<?php

namespace App\Http\Controllers;

use App\Product;
use App\Settings;
use App\Salespage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SalespageController extends Controller
{
    
    public function __construct(){
        $this->middleware('isAdmin')->except(['store']);
    }

    public function approve($id)
    {
        $salespage = Salespage::with(['product', 'user'])->whereId($id)->first();      

        $salespage->approved_at = now();
        $salespage->status = 1;
        $salespage->save();

        $data['name'] = $salespage->user->name;
        $data['email'] = $salespage->user->email;
        $data['phone'] = $salespage->user->phone;
        $data['approved_at'] = $salespage->approved_at;
        $data['created_at'] = $salespage->created_at;
        $data['product'] = $salespage->product->title;

        $data['type'] = 'salespageapprovalemail';

        Mail::to($data['email'])->send(new NotificationEmail($data));
        
        return back()->with('message', 'Request approved successfully');

    }

    public function unapprove($id)
    {
        $salespage = Salespage::with(['product', 'user'])->whereId($id)->first();      

        $salespage->approved_at = null;
        $salespage->status = 0;
        $salespage->save();
             
        return back()->with('message', 'Request approved successfully');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function showsalespage()
    {
        $requests = Salespage::with('product')->get();
        
        return view('admin.salespagerequest.index', compact('requests'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->plan->viewCreatives == 1){
            //Check if user has requested for this salespage before
            $all_requests = Salespage::whereUserId(auth()->user()->id)->whereProductId($request->pid)->whereStatus(0)->first();
     
            if($all_requests !== NULL){
                return back()->with('error', 'You have already requested for this product salespage');
            }
          
            //Ensure last request was a month ago
            $previously_approved = Salespage::whereUserId(auth()->user()->id)->where('created_at', '>=', Carbon::now()->subMonth())->first();

            if($previously_approved != NULL && $previously_approved->count() > 0){
                return back()->with('error', 'You can only request for one salespage per month, You can only make 1 salespage request per month, contact us to request more sales page.');
            }

            $salespage = Salespage::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->pid,
                'status' => 0,
            ]);
            
            //Send email to admin
            $data['name'] = auth()->user()->name;
            $data['email'] = auth()->user()->email;
            $data['phone'] = auth()->user()->phone;
            $data['date_requested'] = $salespage->created_at;
            $data['product'] = Product::whereId($request->pid)->value('title');
            $data['type'] = 'salespageemail';

            Mail::to(Settings::select('official_mail')->first()->value('official_mail'))->send(new NotificationEmail($data));

            return back()->with('message', 'Request has been sent, you will receive an email when your request is approved');
        
        }else{
            return abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salespage  $salespage
     * @return \Illuminate\Http\Response
     */
    public function show(Salespage $salespage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salespage  $salespage
     * @return \Illuminate\Http\Response
     */
    public function edit(Salespage $salespage)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salespage  $salespage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salespage $salespage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salespage  $salespage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salespage $salespage)
    {
        $salespage->delete();

        return back()->with('message', 'Request successfully deleted, user can now create another request');
    }
}
