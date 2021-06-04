<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Suggestion;
use App\Mail\SuggestionMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::with('user')->get();

        return view('admin.suggestions.index', compact('suggestions'));
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
            'file' => 'required|max:1024|mimes:jpg,jpeg,png'
        ]);

        $filename = date('d-M-Y-s') . '-'. pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
        // dd($filename);
        $extension = $request->file->getClientOriginalExtension();                   
        $file = $request->file->storeAs('suggestions', $filename.'.'.$extension,'uploads'); 

        $suggestion = Suggestion::create([
            'name' => $data['name'],
            'image' => $filename.'.'.$extension,
            'user_id' => auth()->user()->id,
        ]);

        //prepare attachments
        $data['product_image'] = base_path() . '/uploads'.'/'. $file;
        $data['type'] = 1;

        //send email to official email
        Mail::to(Settings::select('suggestion_mail')->first()->value('suggestion_mail'))->send(new SuggestionMail($data));
        
        return back()->with('message', 'Product suggestion sent successfully');
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
    public function edit($id)
    {
        $suggestion = Suggestion::find($id);
       
        return view('admin.suggestions.edit', compact('suggestion'));
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
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suggestion = Suggestion::find($id);

        if (file_exists(base_path() . '/uploads/suggestions'.'/'.$suggestion->image))
        unlink( base_path() . '/uploads/suggestions'.'/'. $suggestion->image);
        
        $suggestion->delete();

        return back()->with('message', 'Delete successful');
    }
}
