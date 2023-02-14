@extends('layout.main')
@section('content')
<section class="section dashboard">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        + Add vehicle
    </button>
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{url('administrator/vehicle/add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name vehicle</label>
                            <input type="text" required class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type (Example : heavy vehicle)</label>
                            <input type="text" required class="form-control" id="type" name="type">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image (max 2 Mb)</label>
                            <input type="file" required class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" required id="status" name="status">
                                <option value="not_ready">Not ready</option>
                                <option value="ready">Ready</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Basic Modal-->


    <div class="row mt-5">
        @foreach ($vehicle as $item)
        <div class="col-lg-4">
            <div class="card text-black">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true"><i
                            class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                        data-popper-placement="bottom-end"
                        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 29.6px, 0px);">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="{{url('/')}}/administrator/vehicle/edit/{{ $item['id']}}">Edit</a></li>
                        <li><a class="dropdown-item" href="{{url('/')}}/administrator/vehicle/delete/{{ $item['id']}}">Delete</a></li>
    
                    </ul>
                </div>
                <div class="card-body">
              <center>      <img src="{{url('/') }}/images/vehicle/{{$item['image']}}" style="width: 300px; height: 300px;" class="card-img-top mt-5" alt="Apple Computer" /></center>
                    <div class="text-center">
                        <h5 class="card-title">{{$item['name']}}</h5>
                        <p class="text-muted mb-4">@if ($item['status'] == "not_ready")
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Not Ready</span>
                        @else
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ready</span>
                        @endif</p>
                    </div>
                    <div>

                    </div>
                   

                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
@endsection
