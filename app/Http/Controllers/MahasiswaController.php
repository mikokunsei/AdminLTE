<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('mahasiswas')->get();
        return view('all-mahasiswa', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = array();
        // $data['name'] = $request->name;
        // $data['nim'] = $request->nim;
        // $data['email'] = $request->email;
        // $data['password'] = Hash::make($request->password);
        // $data['phone'] = $request->phone;
        // $data['image'] = $request->file('image');
        // $data['address'] = $request->address;
        // $data['created_at'] = date('Y-m-d H:i:s');
        // $data['updated_at'] = date('Y-m-d H:i:s');

        // $insert = DB::table('mahasiswas')->insert($data);
        // if ($insert) 
        // {
        //     $notification=array(
        //         'messege'=>'Successfully User Created',
        //         'alert-type'=>'success'
        //     );
        //     return redirect()->route('allmahasiswa')->with($notification);
        // }
        
        // else {
        //     $notification=array(
        //         'messege'=>'Something is wrong, please try again!',
        //         'alert-type'=>'error'
        //     );
        //     return redirect()->route('allmahasiswa')->with($notification);
        // }


        $data = Mahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'image' => $request->image,
            'address' => $request->address
            
        ]);

        if ($request->hasFile('image')) {

            $request->file('image')->move('imagemahasiswa/', $request->file('image')->getClientOriginalName()); // ambil image simpan di folder
            $data->image = $request->file('image')->getClientOriginalName(); // ambil nama file
            $data->save();

            $notification=array(
                'messege'=>'Successfully Data Created',
                'alert-type'=>'success'
            );
            return redirect()->route('allmahasiswa')->with($notification);
            
        }

        else {
            $notification=array(
                'messege'=>'Something is wrong !',
                'alert-type'=>'error'
            );
            return redirect()->route('allmahasiswa')->with($notification);
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
        $edit = DB::table('mahasiswas')->where('id',$id)->first();
        return view('edit-mahasiswa', compact('edit'));
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
        // dd($request->password);
            if ($request->hasFile('image')) {
                if ($request->password == null) {
                    $data_mahasiswa = [
                        'name' => $request->name,
                        'nim' => $request->nim,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'image' => $request->image,
                        'address' => $request->address
                        
                        // $data['password'] = Hash::make($request->password);
                    ];
             
                    $data = Mahasiswa::findOrFail($id);
                    $data->update($data_mahasiswa);
                }
                else {
                    $data_mahasiswa = [
                        'name' => $request->name,
                        'nim' => $request->nim,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'phone' => $request->phone,
                        'image' => $request->image,
                        'address' => $request->address
                        
                        // $data['password'] = Hash::make($request->password);
        
                    ];
                
                    $data = Mahasiswa::findOrFail($id);
                    $data->update($request->all());
                }

                $request->file('image')->move('imagemahasiswa/', $request->file('image')->getClientOriginalName()); // ambil image simpan di folder
                $data->image = $request->file('image')->getClientOriginalName(); // ambil nama file
                $data->save();
                
                $notification=array(
                    'messege'=>'Successfully Data Created',
                    'alert-type'=>'success'
                );
                return redirect()->route('allmahasiswa')->with($notification);
             
                
            }
            else {

                if ($request->password == null) {
                    $data_mahasiswa = [
                        'name' => $request->name,
                        'nim' => $request->nim,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address
                        
                        // $data['password'] = Hash::make($request->password);
                    ];  
                    $data = Mahasiswa::findOrFail($id);
                    $data->update($data_mahasiswa);
                    
                }
                    else {
                        // dd(Hash::make($request->password));
                        $data_mahasiswa = [
                            'name' => $request->name,
                            'nim' => $request->nim,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'phone' => $request->phone,
                            'address' => $request->address
                            
                            // $data['password'] = Hash::make($request->password);
            
                        ];
                    
                        $data = Mahasiswa::findOrFail($id);
                        $data->update($data_mahasiswa);
            
                    }
                
                $notification=array(
                    'messege'=>'Data Updated !',
                    'alert-type'=>'success'
                );
                return redirect()->route('allmahasiswa')->with($notification);
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
        $delete = DB::table('mahasiswas')->where('id', $id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Deleted Data Mahasiswa',
                'alert-type'=>'success'
            );
            return redirect()->route('allmahasiswa')->with($notification);
        }
        else {
            $notification=array(
                'messege'=>'Something is wrong !',
                'alert-type'=>'error'
            );
            return redirect()->route('allmahasiswa')->with($notification);
        }
    }
}
