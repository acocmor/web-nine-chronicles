@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section('content')
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Thêm mới địa chỉ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm mới địa chỉ</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <section class="content">
            <div class="container-fluid">
              @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            {{$item}}
                        @endforeach
                    </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                                {{session('thongbao')}}
                        </div>
                    @endif
              <div class="row">
                <div class="col-12">   
                  <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('postAdd')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="address">Address  <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address...">
                    </div>

                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Premium</label>
                          <select name="premium" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="0">None</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Ignoring Message</label>
                          <select name="ignoring" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="0">None</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Protected</label>
                          <select name="protected" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="0">None</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <!-- /.col -->
                    </div>
                    <div class="form-group">
                      <label for="endblock">Premium End Block<span style="color:red;">*</span></label>
                      <input type="number" class="form-control" id="endblock" name="endblock" placeholder="Premium End Block..." value="0">
                    </div>

                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="arenabanner">Arena Banner</label>
                          <input type="number" class="form-control" id="arenabanner" name="arenabanner" placeholder="Arena Banner..." value="0">
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="arenaicon">Arena Icon</label>
                          <input type="number" class="form-control" id="arenaicon" name="arenaicon" placeholder="Arena Icon..." value="0">
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="swordskin">Sword Skin</label>
                          <input type="number" class="form-control" id="swordskin" name="swordskin" placeholder="Sword Skin..." value="0">
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="friendviewskin">Friend View Skin</label>
                          <input type="number" class="form-control" id="friendviewskin" name="friendviewskin" placeholder="Friend View Skin..." value="0">
                        </div>
                        <!-- /.form-group -->
                      </div> 
                      <!-- /.col -->
                    </div>

                    <div class="form-group">
                      <label for="discordid">Discord Id</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="number" class="form-control" id="discordid" name="discordid" placeholder="Discord Id...">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="info">Info User (link FB, Twitter, Phone...)</label>
                      <br>
                      <textarea name="info" id="info" cols="50" rows="3"></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Add</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
@endsection

@section('js')
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>

@endsection