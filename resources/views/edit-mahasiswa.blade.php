@extends('app')

@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-lg-1"></div>
    
                <div class="col-lg-10">    
                    {{-- Card Start --}}
                    <div class="card"> 
                        <div class="card-header">
                            <h5 class="card-title">Edit Mahasiswa</h5>
                        </div>

                        <div class="card-body">
                            <form role="form" action="{{url('/edit-mahasiswa/'. $edit->id)}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label"> 
                                            Name
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="" placeholder="Enter your name" value="{{$edit->name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nim" class="col-sm-2 col-form-label"> 
                                            NIM
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="nim" id="" placeholder="Enter your nim" value="{{$edit->nim}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label"> 
                                            Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="" placeholder="Enter your email" value="{{$edit->email}}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label"> 
                                            Phone
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="phone" id="" placeholder="Enter your phone number" value="{{$edit->phone}}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label"> 
                                            Password
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" id="" placeholder="Password" value="" required>
                                            
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label"> 
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Confirm Password" required>
                                            
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label"> 
                                            Image
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image" id="" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label"> 
                                            Address
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="address" placeholder="Enter your address" value="{{$edit->address}}"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Card End --}}

                </div>

            </div>

            
        </section>

    </div>
    
@endsection