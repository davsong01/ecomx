<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'title' => 'required',
            'mprice' => 'required|numeric',
            'features' => 'required',
            'threemprice' => 'required|numeric',
            'threempercentoff' => 'required|numeric',
            'sixmprice' => 'required|numeric',
            'sixmpercentoff' => 'required|numeric',
            'twelvemprice' => 'required|numeric',
            'twelvempercentoff' => 'required|numeric',
            'status' => 'required|numeric',
            'viewproduct' => 'required|numeric',
            'viewUpsells' => 'required|numeric',
            'viewCreatives' => 'required|numeric',
        ]);

        $features = explode("\r\n", $request->features);

        $plan = Plan::create([
            'title' => $data['title'],
            'mprice' => $data['mprice'],
            'threemprice' => $data['threemprice'],
            'threempercentoff' => $data['threempercentoff'],
            'sixmprice' => $data['sixmprice'],
            'sixmpercentoff' => $data['sixmpercentoff'],
            'twelvemprice' => $data['twelvemprice'],
            'twelvempercentoff' => $data['twelvempercentoff'],
            'status' => $data['status'],
            'viewProducts' => $data['viewproduct'],
            'viewUpsells' => $data['viewUpsells'],
            'viewCreatives' => $data['viewCreatives'],
            'features' => json_encode($features),
        ]);
        
        return redirect(route('plans.index'))->with('message', 'Plan created successfully');
    }

    public function show(Plan $plan)
    {
        //
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request['features'] = json_encode(explode("\r\n", $request->features));
        $plan->update($request->all());

        return back()->with('message', 'Plan updated successfully');
    }

    public function destroy(Plan $plan)
    {
        if($plan->users->count() > 0){
            return back()->with('error', 'You cannot delete this plan because it has subscribers, detach subscribers from plan first');
        }
        $plan->delete();
        return redirect(route('plans.index')); 
    }

    public function updateProfile(){
        
        return view('admin.editProfile');
    }

    public function submitProfile(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.auth()->user()->id,
            'phone' => 'required',
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
        ]);

        //handle password
        if($request['password']){
            $request['password'] = Hash::make($request['password']);
        }else $request['password'] = auth()->user()->password;

        auth()->user()->name = $data['name'];
        auth()->user()->email = $data['email'];
        auth()->user()->phone = $data['phone'];

        auth()->user()->save();

        return back()->with('message', 'Update successfull');
    }
}
