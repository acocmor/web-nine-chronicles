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
                  <h1 class="m-0">Sửa Thành viên Guild: <span style="color:red; font-weight:bold">[{{$guild[0]->Tag}}] {{$guild[0]->Name}}</span></h1>
                  <a href="{{route('guild.edit', ['id' => $guild[0]->id])}}" type="button" class="btn btn-primary">< Quay lại Guild</a>
                    <hr>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa thành viên Guild</li>
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
                  <h3 class="card-title">Edit Guild Player</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(isset($player))
                <form action="{{route('guildPlayer.postEdit', ['id' => $player->id])}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="guild">Change Guild <span style="color:red;">*</span></label>
                            <select name="guild" id="guild" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                @if(isset($listGuild))
                                    @foreach ($listGuild as $item)
                                        <option @if($item->Tag == $player->Guild) selected="selected" @endif  value="{{$item->Tag}}">[{{$item->Tag}}] {{$item->Name}}</option>   
                                    @endforeach
                                @endif
                            </select>
                        </div>

                      <div class="form-group">
                          <label for="address">Address <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address..." value="{{$player->Address}}">
                      </div>
  
                      <div class="form-group">
                          <label for="avatarAddress">Avatar Address <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" id="avatarAddress" name="avatarAddress" placeholder="Avatar Address..." value="{{$player->AvatarAddress}}">
                      </div>
  
                      <div class="form-group">
                          <label for="rank">Rank <span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="rank" name="rank" placeholder="Rank..." value="{{$player->Rank}}">
                      </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</button>
                    </div>
                  </form>
                @endif
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