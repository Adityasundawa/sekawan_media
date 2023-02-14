
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('/')}}/assets/img/favicon.png" rel="icon">
  <link href="{{url('/')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <b> Form Rental</b>
                    </div>
                    <form action="{{url('/')}}/rental/add" method="post">
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
        </div>
    </div>

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('/')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{url('/')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{url('/')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/php-email-form/validate.js"></script>


  @include('sweetalert::alert')

  <!-- Template Main JS File -->
  <script src="{{url('/')}}/assets/js/main.js"></script>

</body>

</html>