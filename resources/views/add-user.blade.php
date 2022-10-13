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
                            <h5 class="card-title">Add User</h5>
                        </div>

                        <div class="card-body">
                            <form role="form" action="{{url('/insert-user')}} " method="POST">
                                @csrf
                                @method('POST')
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label"> 
                                            User name
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label"> 
                                            Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="" placeholder="Enter your email" required> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label"> 
                                            Password
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="" placeholder="Password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-2 col-form-label"> 
                                            User Role Type
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Customer">Customer</option>
                                            </select>
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