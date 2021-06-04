<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function create()
    {
        //
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
    public function update(Request $request, Settings $setting)
    {
 
        //handle logo
        if($request->has('logo')){
            //delete old one
             if($setting->logo){
                if (file_exists(public_path() . '/'.$setting->logo))
                unlink(public_path('/'.$setting->logo));
            }
            
            //save new image
            $imgName = $request->logo->getClientOriginalName();
            $image = Image::make($request->logo)->save(public_path().'/images/site/'.$imgName);

            $setting->logo = 'images/site/'.$imgName;
           
        }
            
        //handle favicon
        if($request->has('favicon')){
            //delete old one
             if($setting->favicon){
                if (file_exists(public_path() . '/'.$setting->favicon))
                unlink(public_path('/'.$setting->favicon));
            }
            
            //save new image
            $imgName = $request->favicon->getClientOriginalName();
            $image = Image::make($request->favicon)->save(public_path().'/images/site/'.$imgName);

            $setting->favicon = 'images/site/'.$imgName;
           
        }

        //handle preloader 
        if($request->has('preloader')){
            //delete old one
             if($setting->preloader){
                if (file_exists(public_path() . '/'.$setting->preloader))
                unlink(public_path('/'.$setting->preloader));
            }
            
            //save new image
            $imgName = $request->preloader->getClientOriginalName();
            $image = Image::make($request->preloader)->save(public_path().'/images/site/'.$imgName);

            $setting->preloader = 'images/site/'.$imgName;
           
        }

        //Save others
        $setting->referral_percent = $request->referral_percent;
        $setting->referral_threshold = $request->referral_threshold;
        $setting->official_mail = $request->official_mail;
        $setting->suggestion_mail = $request->suggestion_mail;
        $setting->salespage_howto = $request->salespage_howto;
        $setting->facebook_howto = $request->facebook_howto;
        $setting->upsell_howto = $request->upsell_howto;

        $setting->save();

        return back()->with('message', 'update successful');
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
