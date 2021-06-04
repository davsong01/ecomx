<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $categories = Category::withCount('products')->get();
       
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //save image
        $imgName = $request->image->getClientOriginalName();
        $image = Image::make($request->image)->save(public_path().'/images/categories/'.$imgName);

        $category = Category::create([
            'title' => $request->title,
            'status' => $request->status,
            'slug' => date('Y-m-d').'-'.str_slug($request->title),
            'image' => 'images/categories/'.$imgName,
        ]);

        return redirect(route('category.index'))->with('message', 'Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        

        //Handle Category image
        if($request->image){

            if($category->image){
                if (file_exists(public_path() . '/'.$category->image))
                unlink(public_path('/'.$category->image));
            }
            
            //save new image
            $imgName = $request->image->getClientOriginalName();
            $image = Image::make($request->image)->save(public_path().'/images/categories/'.$imgName);

            $imagePath  =  'images/categories/'.$imgName;
        }else{
            $imagePath  =  $category->image;
        }
        
        
        $category->update([
            'title' => $request->title,
            'status' => $request->status,
            'slug' => date('Y-m-d').'-'.str_slug($request->title),
            'image' => $imagePath, 
        ]);

        return back()->with('message', 'Update successful');
    }

    public function getfile($filename){
    
        $realpath = base_path() . '/uploads/category'. '/' .$filename;
        return response()->download($realpath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //delete category image
        if (file_exists(public_path() . '/'.$category->image))
            unlink( public_path() .'/'. $category->image);

            $category->delete();

        return redirect(route('category.index'))->with('message', 'Delete successful');
    }
}
