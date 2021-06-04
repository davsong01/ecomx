<?php

namespace App\Http\Controllers;

use App\Ambassador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AmbassadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambassadors = Ambassador::all();

        return view('admin.ambassadors.index', compact('ambassadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ambassadors.create');
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
            'name' => 'required',
            'title' => 'required',
            'linkedin_link' => 'required|url',
            'twitter_link' => 'required|url',
            'facebook_link' => 'required|url',
            'image' => 'required|max:1024|mimes:jpg,jpeg,png',
            'status' => 'required|numeric'
        ]);

        //save image
        $imgName = $request->image->getClientOriginalName();
        $image = Image::make($request->image)->save(public_path().'/images/ambassadors/'.$imgName);

        $ambassador = Ambassador::create([
            'name' => $data['name'],
            'title' => $data['title'],
            'linkedin_link' => $data['linkedin_link'],
            'twitter_link' => $data['twitter_link'],
            'facebook_link' => $data['facebook_link'],
            'image' => '/images/ambassadors/'.$imgName,
            'status' => $data['status'],
        ]);
       
        return back()->with('message', 'Ambassador added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambassador $ambassador)
    {
        return view('admin.ambassadors.edit', compact('ambassador'));
    }

    public function getfile($filename){
    
        $realpath = base_path() . '/uploads/suggestions'. '/' .$filename;
        return response()->download($realpath);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambassador $ambassador)
    {
       
        if($request->image){

            if($ambassador->image){
                if (file_exists(public_path() . '/'.$ambassador->image))
                unlink(public_path('/'.$ambassador->image));
            }
            
            //save new image
            $imgName = $request->image->getClientOriginalName();
            $image = Image::make($request->image)->save(public_path().'/images/ambassadors/'.$imgName);

            $imagePath  =  '/images/ambassadors/'.$imgName;
        }else{
            $imagePath  =  $ambassador->image;
        }

        $ambassador->update([
            'name' =>$request->name,
            'title' => $request->title,
            'linkedin_link' => $request->linkedin_link,
            'twitter_link' => $request->twitter_link,
            'facebook_link' => $request->facebook_link,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambassador $ambassador)
    {        
        if (file_exists(public_path() . '/'.$ambassador->image))
            unlink( public_path() .'/'. $ambassador->image);

            $ambassador->delete();
        return back()->with('message', 'Delete successful');
    }
}
