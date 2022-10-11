<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //elequent better

        //query builder
        $all = DB::table('users')->get();
        return view('all-user', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');


        // $this->validate($request, [
        //     'name' => 'required|min:5',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed', //field_confirmation
        //     'role' => 'required'
        // ]);
        
        
        // $data = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'role' => $request->role
        // ]);

        // $request['password'] = bcrypt($request->input('password'));
        // $data = User::create($request->all());

        $insert = DB::table('users')->insert($data);
        if ($request) 
        {
            $notification=array(
                'messege'=>'Successfully User Created',
                'alert-type'=>'success'
            );
            return redirect()->route('alluser')->with($notification);
        }
        else {
            $notification=array(
                'messege'=>'Something is wrong, please try again!',
                'alert-type'=>'error'
            );
            return redirect()->route('alluser')->with($notification);
        }
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
        $edit = DB::table('users')->where('id',$id)->first();
        return view('edit-user', compact('edit'));
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
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        // $data = User::findOrFail($id);
        // $data->update($request->all());

        $update = DB::table('users')->where('id', $id)->update($data);
        if ($request->password == null) {
            $notification=array(
                'messege'=>'User Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('alluser')->with($notification);
        }
        else {
            $notification=array(
                'messege'=>'Something is wrong, please try again!',
                'alert-type'=>'error'
            );
            return redirect()->route('alluser')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Deleted User',
                'alert-type'=>'success'
            );
            return redirect()->route('alluser')->with($notification);
        }
        else {
            $notification=array(
                'messege'=>'Something is wrong !',
                'alert-type'=>'error'
            );
            return redirect()->route('alluser')->with($notification);
        }
    }
}
