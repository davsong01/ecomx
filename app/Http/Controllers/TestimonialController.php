<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
            'image' => 'required|max:1024|mimes:jpg,jpeg,png',
            'content' => 'required',
            'status' => 'required|numeric'
        ]);

        //save image
        $imgName = $request->image->getClientOriginalName();
        $image = Image::make($request->image)->save(public_path().'/images/testimonials/'.$imgName);

        $testimonial = Testimonial::create([
            'name' => $data['name'],
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => '/images/testimonials/'.$imgName,
            'status' => $data['status'],
        ]);
       
        return back()->with('message', 'testimonial added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if($request->image){

            if($testimonial->image){
                if (file_exists(public_path() . '/'.$testimonial->image))
                unlink(public_path('/'.$testimonial->image));
            }
            
            //save new image
            $imgName = $request->image->getClientOriginalName();
            $image = Image::make($request->image)->save(public_path().'/images/testimonials/'.$imgName);

            $imagePath  =  '/images/testimonials/'.$imgName;
        }else{
            $imagePath  =  $testimonial->image;
        }

        $testimonial->update([
            'name' =>$request->name,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (file_exists(public_path() . '/'.$testimonial->image))
            unlink( public_path() .'/'. $testimonial->image);

            $testimonial->delete();

        return back()->with('message', 'Delete successful');
    }
}
