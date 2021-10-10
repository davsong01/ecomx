<?php

namespace App\Http\Controllers;

use App\Product;
use App\BestSeller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BestSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bestsellers = BestSeller::all();
        $bestsellers = BestSeller::with('product')->where('order', '<>', null)->orderBy('order', 'ASC')->get();
        // $users = User::select('users.*')
        // ->join('companies', 'companies.user_id', '=', 'users.id')
        // ->orderBy('companies.name')
        // ->get();
        
        return view('admin.bestsellers.index')->with('bestsellers', $bestsellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::wheredoesntHave('bestseller')->whereStatus(1)->get();
       
        return view('admin.bestsellers.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'product' => 'required',
            'order' => 'required|numeric',
        ]);

        $bestseller = BestSeller::create([
            'product_id' => $data['product'],
            'order' => $data['order']
        ]); 

        return redirect(route('bestseller.index'))->with('message', 'Bestseller product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BestSeller  $bestSeller
     * @return \Illuminate\Http\Response
     */
    public function show(BestSeller $bestSeller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BestSeller  $bestSeller
     * @return \Illuminate\Http\Response
     */
    public function edit(BestSeller $bestseller)
    {
        return view('admin.bestsellers.edit', compact('bestseller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BestSeller  $bestSeller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestSeller $bestseller)
    {
        $bestseller->update($request->all());

        return redirect(route('bestseller.index'))->with('message', 'Operation successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BestSeller  $bestSeller
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestSeller $bestseller)
    {

        $bestseller->delete();

        return back()->with('message', 'Operation successful');
    }
}
