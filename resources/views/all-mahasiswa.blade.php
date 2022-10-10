@extends('app')
@section('content')
   <div class="content-wrapper">
         <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Serial</th>
                      <th>Name</th>
                      <th>NIM</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Image</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->email }}</td>
                                <td>0{{ $row->phone }}</td>
                                <td>
                                  {{-- <img src="{{ $row->image }}" alt=""> --}}
                                  {{-- <img src="{{URL::asset( $row->image)}} " alt="" style="width: 40px"> --}}
                                  <img src="{{asset('imagemahasiswa/' . $row->image)}} " alt="" style="width: 40px">
                                </td>
                                <td>{{ $row->address }}</td>
                                <td>
                                    <a href="{{url('/edit-mahasiswa/'. $row->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        
                            
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
   </div>
@endsection
