@extends('layout.main')
@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Vehicle <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-life-preserver"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($vehicle)}}</h6>
                            <span class="text-success small pt-1 fw-bold">{{ count($vehicle->where('status','not_ready'))}} </span> <span class="text-muted small pt-2 ps-1">used</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Drivers <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($driver)}}</h6>
                            <span class="text-success small pt-1 fw-bold">{{count($driver->where('status','not_ready'))}}</span> <span class="text-muted small pt-2 ps-1">used</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">User <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($user)}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-12">
                <div class="card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>
  
                    <!-- Line Chart -->
                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                    
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChart'), {
                          type: 'bar',
                          data: {
                            labels: [@foreach ($vehicle as $vehicles)
                            '{{$vehicles['name']}}',
                         @endforeach],
                            datasets: [{
                              label: 'Bar Chart',
                              data: [@foreach ($vehicle as $vehicless)
                            
                             {{$order->where('vehicles_id',$vehicless['id'])->count()}} ,
                         @endforeach],
                              backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                              ],
                              borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                              ],
                              borderWidth: 1
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            }
                          }
                        });
                      });
                    </script>
                    <!-- End Line Chart -->
  
                  </div>
  
                </div>
              </div><!-- End Reports -->
        </div>
    </div>
</section>
@endsection
