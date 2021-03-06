@extends('layouts.default')
@section('content')
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Database Project</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Dominize</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="{{ route('dorms.index') }}">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                รายละเอียดหอ</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="รายรับรายจ่าย">
            <a class="nav-link" href="{{ route('dormExpenses.index') }}">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">
                รายรับรายจ่าย</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="สถาณะหอพัก">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">
                สถานะหอพัก</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li>
                <a href="{{ route('rooms.index') }}">ดูห้องว่าง</a>
              </li>
              <li>
                <a href="{{ route('bills.index') }}">ดูห้องค้างชำระ</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="รายละเอียด">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-file"></i>
              <span class="nav-link-text">
                รายละเอียด</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
              <li>
                <a href="rules.html">รายละเอียดกฎ</a>
              </li>
              <li>
                <a href="{{ route('staffs.index') }}">บุคลากร</a>
              </li>
              <li>
                <a href="#">สัญญาเช่า</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>

      <div class="container-fluid">
      <ol class="breadcrumb">
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">ที่อยู่หอพัก</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                        843/9  ต. เวียง อ.เมือง จ.เชียงใหม่ 57001  เบอร์โทรติดต่อ 085-5555556  ,095-4545445                       
                    </div>
                                    </div>
                                </div>
                
                 </ol>
                 
                 
                 <ol class="breadcrumb">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">รายละเอียดหอพัก</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            รายละเอียดหอพัก
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Building Amount</th>
                  <th>Room Amount</th>
                  <th>elec_unit_cost</th>
                  <th>water_unit_cost</th>
                  <th>Description</th>
                  <th>Rule</th>
                  </tr>
                </thead>
               
                <tbody>
                @foreach ($dorms as $dorm)
                <tr>
                    <td>{{ $dorm->name}}</td>
                    <td>{{ $dorm->location}}</td>
                    <td>{{ $dorm->building_amt}}</td>
                    <td>{{ $dorm->room_amt}}</td>
                    <td>{{ $dorm->elec_unit_cost}}</td>
                    <td>{{ $dorm->water_unit_cost}}</td>
                    <td>{{ $dorm->description}}</td>
                    <td>{{ $dorm->rule}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
          </div>
        </div> 
                    </div>
                                    </div>
                                </div>
                
                 </ol>
                 <ol class="breadcrumb">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">รายละเอียดห้อง</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            รายละเอียดห้องพัก
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ประเภทห้อง</th>
                    <th>ขนาดห้อง</th>
                    <th>ตึก/ชั้น</th>
                    <th>ราคาเช่า/เดือน</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($roomtypes as $roomtype)
                <tr>
                    <td>{{ $roomtype->id}}</td>
                    <td>{{ $roomtype->name}}</td>
                    <td>{{ $roomtype->description}}</td>
                    <td>{{ $roomtype->quantity}}</td>
                    <td>{{ $roomtype->cost}}</td>
                </tr>
                @endforeach
                
               
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
          </div>
        </div> 
                    </div>
                                    </div>
                                </div>
                 </ol>
      <ol class="breadcrumb">
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">รายละเอียดเฟอร์นิเจอร์</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            รายละเอียดเฟอร์นิเจอร์
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Cost</th>
                  
                  
                  </tr>
                </thead>
               
                <tbody>
                @foreach ($furnitures as $furniture)
                <tr>
                    <td>{{ $furniture->id}}</td>
                    <td>{{ $furniture->name}}</td>
                    <td>{{ $furniture->description}}</td>
                    <td>{{ $furniture->quantity}}</td>
                    <td>{{ $furniture->cost}}</td>
                    
        </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM 
          </div>
        </div>                      
                    </div>
                                    </div>
                                </div>
                
                 </ol>
                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

 
 
 
     
       
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
@endsection