<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view('admin.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Resource::create($request->all());
        return back()->with('message', 'Operation Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $resource->update($request->all());

        return redirect(route('resource.index'))->with('message', 'Operation successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect(route('resource.index'))->with('message', 'Delete Successful');
    }

    public function  getResources()
    {
        $resources = Resource::all();

        if (auth()->user()->plan_id == NULL && auth()->user()->level == 1 ) {
            $resources = Resource::where('public', 1)->get();
        }

        if (auth()->user()->plan_id != NULL && auth()->user()->level == 1 && (auth()->user()->plan_expiry < now())) {
            $resources = Resource::where('public', 1)->get();
        }

    
        return view('users.resources', compact('resources'));
    }
   
}
