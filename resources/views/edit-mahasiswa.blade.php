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
                            <form role="form" action="{{url('/update-mahasiswa/'. $edit->id)}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label"> 
                                            Name
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Enter your name" value="{{$edit->name}}" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nim" class="col-sm-2 col-form-label"> 
                                            NIM
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" id="" placeholder="Enter your nim" value="{{$edit->nim}}" required>
                                            @error('nim')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label"> 
                                            Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="" placeholder="Enter your email" value="{{$edit->email}}" required> 
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label"> 
                                            Phone
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="" placeholder="Enter your phone number" value="0{{$edit->phone}}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label"> 
                                            Password
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="" placeholder="Password" value="" >
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-2 col-form-label"> 
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label"> 
                                            Image
                                        </label>
                                        <div class="col-sm-10">
                                            {{-- <img class="img-preview img-fluid"> --}}
                                            <img src="{{asset('imagemahasiswa/' . $edit->image)}}" alt="" style="width: 100px" class="mb-2">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="" value="{{$edit->image}}" onchange="previewImage()">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            {{-- Menyimpan nama file yang lama --}}
                                            <input type="hidden" name="image_old" value="{{$edit->image}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label"> 
                                            Address
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="address" placeholder="Enter your address" > {{$edit->address}}</textarea>
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

    {{-- <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
            
        }
    </script> --}}
@endsection