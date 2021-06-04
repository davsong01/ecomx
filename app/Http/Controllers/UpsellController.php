<?php

namespace App\Http\Controllers;

use App\Upsell;
use App\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UpsellController extends Controller
{
    public function index()
    {
        $upsells = Upsell::all();
      
        return view('admin.upsells.index', compact('upsells'));
    }

    public function create()
    {
        $products = Product::whereStatus(1)->get();
       
        return view('admin.upsells.create', compact('products'));

    }

    public function store(Request $request)
    {
       
        $data = $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'f_images.*' => 'nullable|max:3024|mimes:jpg,jpeg,png,bmp',
            'status' => 'required|numeric',
            'video_link' => 'required',
        ]);

        if($request->has('f_images')){
            $images = array();
            //Store images
            foreach($request->f_images as $file){
                $filename = date('d-M-Y-s') . '-'. pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();                   
                $filePath = $file->storeAs('upsells', $filename.'.'.$extension,'uploads'); 
                array_push($images, $filename.'.'.$extension );
            }
        }else $images = NULL;

        $images = json_encode($images);

        try{
            $upsell = Upsell::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'status' => $data['status'],
                'f_images' => $images,
                'slug' => date('Y-m-d').'-'.str_slug($data['name']),
                'video_link' => $data['video_link']
            ]);

            }catch(\Illuminate\Database\QueryException $e){
                $error = $e->getMessage();
                return back()->with('error', $error);
            }

        return redirect(route('upsells.index'))->with('message', 'Upsell successfullly added');
    }

    public function update(Request $request, Upsell $upsell)
    {

        //handle additional images
        if($request->has('f_images')){
            $image = json_decode($upsell->f_images);
            if($image ==  null){
                $image = array();
            }
            //Store image
            foreach($request->f_images as $file){
                $filename = date('d-M-Y-s') . '-'. pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                Storage::disk('uploads')->putFileAs('upsells', new File($file->path()), $filename.'.'.$extension);
                array_push($image, $filename.'.'.$extension );
            }

            $upsell->f_images = json_encode($image);
        }

        $upsell->name = $request['name'];
        $upsell->price = $request['price'];
        $upsell->status = $request['status'];
        $upsell->video_link = $request['video_link'];

        $upsell->save();
        return back()->with('message', 'Update Successful');
    }

   
    

    public function edit(Upsell $upsell)
    {
        return view('admin.upsells.edit')->with('upsell', $upsell);        
    }

    public function destroy(Upsell $upsell)
    {
 
        $files_array = json_decode($upsell->f_images, true);

            foreach ($files_array as $key => $value) {
                //delete all existing images from server
                    if (file_exists(base_path() . '/uploads/upsells'.'/'.$value))
                        unlink( base_path() . '/uploads/upsells'.'/'. $value);

            }

        $upsell->delete();

        return back()->with('message', 'Delete successful');
    }

    public function getfile($filename){
    
        $realpath = base_path() . '/uploads/upsells'. '/' .$filename;
        
        return response()->download($realpath);
    }

    public function replaceUpsellFile(Request $request)
    {
       if($request->has('image')){
        // dd($request->all());

        $files = Upsell::whereId($request->pid)->first();
        
        $files_array = json_decode($files->f_images, true);

            foreach ($files_array as $key => $value) {
                if ($value == $request->old_image) {

                    //Store new image to disk
                    $filename = date('d-M-Y-s') . '-'. pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->image->getClientOriginalExtension();
                    $filePath = $request->image->storeAs('upsells', $filename.'.'.$extension,'uploads'); 

                    //delete old image from server
                    if (file_exists(base_path() . '/uploads/upsells'.'/'.$request->old_image))
                        unlink( base_path() . '/uploads/upsells'.'/'. $request->old_image);
                    //replace in array
                    $files_array[$key] = $filename.'.'.$extension;

                    
                }
            }

        $files->f_images = json_encode($files_array);

        $files->save();

        return back()->with('message', 'Image change is succesful');
         
       }

        if($request->has('video')){
        // dd($request->video);

        $files = Post::whereId($request->pid)->first();
        
        $files_array = json_decode($files->videos, true);

            foreach ($files_array as $key => $value) {
                if ($value == $request->old_video) {

                    //Store new video to disk
                    $filename = date('d-M-Y-s') . '-'. pathinfo($request->video->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->video->getClientOriginalExtension();
                    Storage::disk('uploads')->putFileAs('upsells', new File($request->video->path()), $filename.'.'.$extension);
                    // $filePath = $request->video->storeAs('posts', $filename.'.'.$extension,'uploads'); 

                    //delete old video from server
                    unlink( base_path() . '/uploads/upsells'.'/'. $request->old_video);
                    //replace in array
                    $files_array[$key] = $filename.'.'.$extension;

                    
                }
            }

        $files->videos = json_encode($files_array);

        $files->save();

        return back()->with('message', 'video change is succesful');
         
       }
    }

    public function deleteUpsellFile(Request $request)
    {
 
        $files = Upsell::whereId($request->pid)->first();
              
        $files_array = json_decode($files->f_images, true);

            foreach ($files_array as $key => $value) {
                
                if ($value == $request->old_image) {
                    //delete old image from server
                    if (file_exists(base_path() . '/uploads/upsells'.'/'.$request->old_image))
                        unlink( base_path() . '/uploads/upsells'.'/'. $request->old_image);
                    
                    //remove from array
                    unset($files_array[$key]);

                }
            }
            
        $files['f_images'] = json_encode((array_values($files_array)));
        // dd($files['f_image']);
        $files->update([
            'f_images' => $files['f_images'],
        ]);

        return back()->with('message', 'Image successfully deleted');

    }
}
