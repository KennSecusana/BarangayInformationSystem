@extends('layouts.apps')
@section('content')
<div class="d-flex justify-content-end mt-2">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Create
  </button>

  <form method="post" action="{{url('create_certificate_residencies')}}">
    @csrf
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create....</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="" for="">Date: </label>
                        <input type="date" name="date" class="form-control"  required>

                    </div>
                    <div class="form-group">
                        <label style="" for="">Name: </label>
                        <input type="text" name="name" class="form-control"  required>
                    </div>
                </div><div class="col-md-4">
                    <div class="form-group">
                        <label style="" for="">Residency Status: </label>
                        <input type="text" name="residency_status" class="form-control" placeholder="Enter status of residency" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="" for="">Barangay: </label>
                        <input type="text" name="barangay" class="form-control" placeholder="Enter barangay" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="" for="">Punong Barangay: </label>
                        <input type="text" name="punongbarangay" class="form-control" placeholder="Enter punong barangay" required>
                    </div>



                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="col-md-12">
        <h1 class="mt-1" style="font-weight: 400">Certificate of Residency</h1>
        <hr>
        <table class="table table-striped table">
            <thead class="bg-secondary text-center">
                <tr class="text-light">
                    <th>Print</th>
                    <th>Name</th>
                    <th>Residency Status</th>
                    <th>Barangay</th>
                    <th>Date</th>
                    <th>Punong Barangay</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">

                @foreach ( $certificate_residencies as $item )
                    <tr class="text-dark">
                      <td><button class="btn btn-sm btn-info">
                        <a href="{{url('export_certificate_residencies/'.$item->id)}}" class="btn btn-sm text-light">Print</a>
                    </button></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->residency_status}}</td>
                        <td>{{$item->barangay}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->punongbarangay}}</td>
                        <td><span> <a href="{{url('edit_certificate_residencies/'.$item->id)}}" class="btn btn-warning btn-sm text-light">Edit</a></span>
                         <span>
                            <a href="{{url('delete_certificate_residencies/'.$item->id)}}" class="btn btn-danger btn-sm text-light">Delete</a>
                        </span></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
