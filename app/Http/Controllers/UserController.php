<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllUser()
    {
        $all = DB::table('users')->get();
        return view('all-user', compact('all'));
    }

    //Add User and Insert User
    public function Adduser()
    {
        return view('add-user');
    }

    public function InsertUser(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $insert = DB::table('users')->insert($data);
        if ($insert) 
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

    public function EditUser($id)
    {
        $edit = DB::table('users')->where('id',$id)->first();
        return view('edit-user', compact('edit'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $update = DB::table('users')->where('id', $id)->update($data);
        if ($update) {
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

    public function DeleteUser($id)
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
                'messege'=>'Something is wrong, please try again!',
                'alert-type'=>'error'
            );
            return redirect()->route('alluser')->with($notification);
        }
    }
}
