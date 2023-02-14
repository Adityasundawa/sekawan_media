@extends('layout.main')
@section('content')
<section class="section dashboard">

    <div class="row">

        <div class="card">
            <div class="card-header">
                <b>Data Rental</b>
                <a href="{{url('/')}}/export/order" class="btn btn-sm btn-success ml-5">Export Excel</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Drivers</th>
                        <th>Vehicle</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $rental)
                      <?php $driver_data =  $drivers->where('id',$rental->driverss_id)->first(); ?>
                      <?php $vehicle_data =  $vehicle->where('id',$rental->vehicles_id)->first(); ?>
                      <tr>
                        <td>{{ $rental->name }}</td>
                        <td>{{ $rental->email }}</td>
                        <td>{{ $driver_data->name}}</td>
                        <td>{{ $vehicle_data->name }}</td>
                        <td>{{ $rental->duration }} Days</td>
                        <td>{{ $rental->status }}</td>
                        <td><div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">Action</button>
                            <ul class="dropdown-menu" data-popper-placement="top-start" data-popper-reference-hidden="" data-popper-escaped="" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -38.2px);">
                                @if (auth()->user()->role_id == 1)
                                <li><a class="dropdown-item" href="{{url('/')}}/administrator/rental/accept/{{ $rental->id}}">Accept Order</a>
                                </li>
                                <li><a class="dropdown-item" href="{{url('/')}}/administrator/rental/decline/{{ $rental->id}}">Decline Order</a>
                                </li>
                                @else
                                <li><a class="dropdown-item" href="{{url('/')}}/agreement/rental/accept/{{ $rental->id}}">Accept Order</a>
                                </li>
                                <li><a class="dropdown-item" href="{{url('/')}}/agreement/rental/decline/{{ $rental->id}}">Decline Order</a>
                                </li>
                                @endif
                            </ul>
                        </div></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="card"  @if (auth()->user()->role_id != 1)style="display : none"    @endif>
            <div class="card-header">
                <b> Form Rental</b>
            </div>
            <form action="{{url('/')}}/administrator/rental/add" method="post">
                @csrf
                <div class="card-body">

                    <div class="row mb-3 mt-4">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required placeholder="John Doe" name="name">
                        </div>
                    </div>
                    <div class="row mb-3 mt-4">
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required placeholder="example@example.com" name="email">
                        </div>
                    </div>
                    <div class="row mb-3 mt-4">
                        <label for="inputText" class="col-sm-2 col-form-label">Drivers</label>
                        <div class="col-sm-10">
                             <select class="form-select" name="drivers" aria-label="Default select example">
                                <option selected="">Select Drivers</option>
                                @foreach ($drivers as $item)
                                @if ($item['status'] == "ready")
                                <option value="{{$item['id']}}">{{$item['name']}} - {{$item['phone']}} - Ready</option>
                                @else
                                <option disabled value="{{$item['id']}}">{{$item['name']}} - {{$item['phone']}} - Not Ready</option>
                                @endif
                               
                                @endforeach
                           
                              
                              </select>
                        </div>
                    </div>
    
                    <div class="row mb-3 mt-4">
                        <label for="inputText" class="col-sm-2 col-form-label">Vehicle</label>
                        <div class="col-sm-10">
                             <select class="form-select" name="vehicle" aria-label="Default select example">
                                <option selected="">Select vehicle</option>
                                @foreach ($vehicle as $items)
                                @if ($items['status'] == "ready")
                                <option value="1">{{$items['id']}} - {{$items['type']}} - Ready</option>
                                @else
                                <option disabled value="1">{{$items['id']}} - {{$items['type']}} - Not Ready</option>
                                @endif
                                @endforeach
                              </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        
                        <div class="input-group mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Duration</label>
                            <input type="number" class="form-control" placeholder="Days" name="duration" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">Days</span>
                          </div>
                      </div>
                    <button class="btn btn btn-success"><i class="bi bi-cloud-upload"></i> Send Form Rental </button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
