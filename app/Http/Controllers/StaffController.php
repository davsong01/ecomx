<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $staff = User::where('id', '<>', auth()->user()->id)->where('level', '<>', 1)->get();
        
        return view('admin.staff.index', compact('staff'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');  
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
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable',
            'password' => 'nullable|min:4',
            'level' => 'required'
        ]);

        //Handle Password
        if($request['password']){
            $data['password'] = Hash::make($request['password']);
        }else $data['password'] = Hash::make(123454321);

        try{  
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $data['password'],
                'username' => str_slug($request->name).date('d-s'),
                'level' => $data['level'],
            ]);
           
        }catch (\Illuminate\Database\QueryException $ex) {
            $error = $ex->getMessage();        
            return back()->with('error', $error);
        }
    
        return redirect(route('staff.index'))->with('message', 'Staff successfully created');

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
        
        $staff = User::findorfail($id);

        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = User::findorfail($id);

        //handle password
        if($request['password']){
            $request['password'] = Hash::make($request['password']);
        }else $request['password'] = $staff->password;

            $staff->update($request->all());

        return back()->with('message', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);

        $user->delete();

        return back()->with('message', 'Record has been deleted forever!');
    }
}
