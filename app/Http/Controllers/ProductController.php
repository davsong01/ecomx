<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\Upsell;
use App\Product;
use App\Category;
use Illuminate\Http\File;
use App\Mail\NewProductMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $no = 1;
        foreach($products as $product){
        
            $product['upsell_products_count'] = count(json_decode($product->upsell_products));
        
        }

        return view('admin.products.index', compact('products', 'no'));
    }


    public function create()
    {
        $upsells = Upsell::whereStatus(1)->get();
    
        $categories = Category::whereStatus(1)->get();
        $plans = Plan::whereStatus(1)->get();
       
        return view('admin.products.create', compact('upsells', 'categories', 'plans'));
    }

    public function store(Request $request)
    {
     
        $data = $this->validate($request, [ 
            'title' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'f_images.*' => 'nullable|max:3024|mimes:jpg,jpeg,png,bmp',
            'videos' => 'nullable',
            'creatives' => 'required',
            'description' => 'required',
            'salespage_link' => 'nullable|url',
            'upsell' => 'nullable',
            'category' => 'required',
            'status' => 'required|numeric',
            'salespage_file' => 'nullable|max:1024',

        ]);  
        
        //handle salespage file
        
        if($request->has('salespage_file')){
            //Store images
                $filename = date('d-M-Y-s') . '-'. pathinfo($request->salespage_file->getClientOriginalName(), PATHINFO_FILENAME);
                // dd($filename);
                $extension = $request->salespage_file->getClientOriginalExtension();                   
                $salespage_file = $request->salespage_file->storeAs('salespage_files', $filename.'.'.$extension,'uploads'); 
       
        }else $salespage_file = NULL;
       
        //handle images
        if($request->has('f_images')){
            $images = array();
            //Store images
            foreach($request->f_images as $file){
                $filename = date('d-M-Y-s') . '-'. pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();                   
                $filePath = $file->storeAs('products', $filename.'.'.$extension,'uploads'); 
                array_push($images, $filename.'.'.$extension );
            }
        }else $images = NULL;

        //Handle Upsells
        if($request->has('upsell')){
            $data['upsell'] = $data['upsell'];
        }else{
            $data['upsell'] = [];
        }
   
        $product = Product::create([
            'title' => $data['title'],
            'slug' => date('Y-m-d:s'),
            'slug' => date('Y-m-d').'-'.str_slug($data['title']),
            'price' => $data['price'],
            'stock' => $data['stock'],
            'creatives' => $data['creatives'],
            'description' => $data['description'],
            'salespage_link' => $data['salespage_link'],
            'salespage_file' => $salespage_file,
            'upsell_products' => json_encode($data['upsell']),
            'status' => $data['status'],
            'f_image' => json_encode($images),
            // 'videos' => json_encode($videos),
            'videos' => $data['videos'],
            
        ]);

        //Attach categories
        if($request->has('category')){
            foreach($data['category'] as $key => $value ){
                $product->category()->attach($value, [
                    'created_at' =>  date("Y-m-d H:i:s"),
                    ] );
            }
        }
        
        
        if($product->status == 1){
            //Send mail to all subscribers
            $subscribers = User::whereLevel(1)->get();
            $this->sendNewProductEmail($subscribers);
        }
             
        return redirect(route('products.index'))->with('message', 'Product successfully added');
    }

    public function resendEmail($id){
            $subscribers = User::whereLevel(1)->get();
            $this->sendNewProductEmail($subscribers);

            return back()->with('message', 'Email sent');
    }

    private function sendNewProductEmail($subscribers){
        foreach($subscribers as $subscriber){
               
            $d['name'] = $subscriber->name;
            $d['type'] = 'newproduct';
            Mail::to($subscriber->email)->send(new NewProductMail($d));
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $upsells = Upsell::whereStatus(1)->get();
        $plans = Plan::whereStatus(1)->get();
        $categories = Category::whereStatus(1)->get();
        $salespage_file = ltrim($product->salespage_file, 'salespage_files/');
        
        return view('admin.products.edit', compact('product', 'salespage_file', 'upsells', 'plans', 'categories')); 
    }

    public function update(Request $request, Product $product)
    {
        //handle additional images
        if($request->has('f_images')){
            $image = json_decode($product->f_image);
            if($image ==  null){
                $image = array();
            }
            //Store image
            foreach($request->f_images as $file){
                $filename = date('d-M-Y-s') . '-'. pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                Storage::disk('uploads')->putFileAs('products', new File($file->path()), $filename.'.'.$extension);
                array_push($image, $filename.'.'.$extension );
            }

            $product->f_image = json_encode($image);
        }

        //handle salespage file
        if($request->has('salespage_file')){
            //Store images
            
            $filename = date('d-M-Y-s') . '-'. pathinfo($request->salespage_file->getClientOriginalName(), PATHINFO_FILENAME);
            
            $extension = $request->salespage_file->getClientOriginalExtension();                   
            $salespage_file = $request->salespage_file->storeAs('salespage_files', $filename.'.'.$extension,'uploads'); 
            $request->all();
            //delete previous
            if(isset($product->salespage_file)){
                if (file_exists(base_path() . '/uploads/salespage_files'.'/'.ltrim($product->salespage_file, 'salespage_files/')))
                    unlink( base_path() . '/uploads/salespage_files'.'/'. ltrim($product->salespage_file, 'salespage_files/'));

            }
       
        }else $salespage_file = NULL;

        $product->salespage_file = $salespage_file;
       
        
        //sync categories
        if($request->has('category')){
            if($product->category->count() < 1){
                //Add new category

                foreach($request->category as $key => $value ){
                    $product->category()->attach($value, [
                        'created_at' =>  date("Y-m-d H:i:s"),
                        ] );
                }
            }else{
               
                $update_array = array();
                foreach($request->category as $key => $value ){
                    
                    array_push($update_array,  $value );
                    
                }

                $product->category()->sync(array_values($update_array));

            }
            
        }
        //Handle Upsells
        if($request->has('upsell_products')){
            $data['upsell'] = $request->upsell_products;
        }else{
            $data['upsell'] = [];
        }

        $product->title = $request->title;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->creatives = $request->creatives;
        $product->salespage_link = $request->salespage_link;
        $product->status = $request->status;
        $product->videos = $request->videos;
        $product->description = $request->description;
        $product->upsell_products = json_encode($data['upsell']);
        $product->save();

        return back()->with('message', 'Update successfull');

    }

    public function destroy(Product $product)
    {
        //Detach product rom category
        $product->category()->detach();

        //Delete all images 
        if(isset($product->f_image)){
            $files_array = json_decode($product->f_image, true);

            foreach ($files_array as $key => $value) {
                //delete all existing images from server
                    if (file_exists(base_path() . '/uploads/products'.'/'.$value))
                        unlink( base_path() . '/uploads/products'.'/'. $value);

            }
        }
        
        //Delete all video files 
        if(isset($product->video)){
            $files = json_decode($product->video, true);

                foreach ($files as $key => $value) {
                    //delete all existing images from server
                        if (file_exists(base_path() . '/uploads/products'.'/'.$value))
                            unlink( base_path() . '/uploads/products'.'/'. $value);

                }
        }   
        //Delete entry
        $product->delete();

        return back()->with('message', 'Delete successful');
    }

    public function getfile($filename){
    
        $realpath = base_path() . '/uploads/products'. '/' .$filename;
        return response()->download($realpath);
    }

    public function getsalespagefile($filename){
        $realpath = base_path() . '/uploads/salespage_files'. '/' .$filename;
        return response()->download($realpath);
    }
    
    
    public function deleteProductFile(Request $request)
    {
        // dd($request->all());

        $files = Product::whereId($request->pid)->first();
              
        $files_array = json_decode($files->f_image, true);

            foreach ($files_array as $key => $value) {
                
                if ($value == $request->old_image) {
                    //delete old image from server
                    if (file_exists(base_path() . '/uploads/products'.'/'.$request->old_image))
                        unlink( base_path() . '/uploads/products'.'/'. $request->old_image);
                    
                    //remove from array
                    unset($files_array[$key]);

                }
            }
            
        $files['f_image'] = json_encode((array_values($files_array)));
        // dd($files['f_image']);
        $files->update([
            'f_image' => $files['f_image'],
        ]);

        return back()->with('message', 'Image successfully deleted');

    }
    public function replaceProductFile(Request $request)
    {
  
        $files = Product::whereId($request->pid)->first();
        
       if($request->has('image')){
      
        $files_array = json_decode($files->f_image, true);

            foreach ($files_array as $key => $value) {
                
                if ($value == $request->old_image) {
                    
                    //Store new image to disk
                    $filename = date('d-M-Y-s') . '-'. pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->image->getClientOriginalExtension();
                    $filePath = $request->image->storeAs('products', $filename.'.'.$extension,'uploads'); 

                    //delete old image from server
                    if (file_exists(base_path() . '/uploads/products'.'/'.$request->old_image))
                        unlink( base_path() . '/uploads/products'.'/'. $request->old_image);
                    //replace in array
                    $files_array[$key] = $filename.'.'.$extension;

                }
            }

        $files->f_image = json_encode($files_array);

        $files->save();

        return back()->with('message', 'Image change is succesful');
         
       }

        if($request->has('video')){
        // dd($request->video);
        
        $files_array = json_decode($files->videos, true);

            foreach ($files_array as $key => $value) {
                if ($value == $request->old_video) {

                    //Store new video to disk
                    $filename = date('d-M-Y-s') . '-'. pathinfo($request->video->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->video->getClientOriginalExtension();
                    Storage::disk('uploads')->putFileAs('products', new File($request->video->path()), $filename.'.'.$extension);

                    //delete old video from server
                    if (file_exists(base_path() . '/uploads/products'.'/'.$request->old_video))
                    unlink( base_path() . '/uploads/products'.'/'. $request->old_video);
                    //replace in array
                    $files_array[$key] = $filename.'.'.$extension;

                    
                }
            }

        $files->videos = json_encode($files_array);

        $files->save();

        return back()->with('message', 'video change is succesful');
         
       }
    }
}
