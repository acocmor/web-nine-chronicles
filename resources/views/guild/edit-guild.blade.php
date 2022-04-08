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
                  <h1 class="m-0">Sửa Guild</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa Guild</li>
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
                                <h3 class="card-title">Edit Guild</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($guild))
                            <form action="{{route('guild.postEdit', ['id' => $guild->id])}}" method="POST">
                                @csrf
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name..." value="{{$guild->Name}}">
                                </div>
            
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tag">Tag <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag..." value="{{$guild->Tag}}">
                                        </div>
                                    <!-- /.form-group -->
                                    </div> 
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Desc <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Desc..." value="{{$guild->Desc}}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="minLevel">MinLevel <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" id="minLevel" name="minLevel" placeholder="MinLevel..." value="{{$guild->MinLevel}}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="type">Type <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" id="type" name="type" placeholder="Type..." value="{{$guild->Type}}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
                                    <!-- /.col -->
                                </div>
                                
            
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="link">Link <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="link" name="link" placeholder="Link..." value="{{$guild->Link}}">
                                        </div>
                                    <!-- /.form-group -->
                                    </div> 
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                        <label for="language">Language <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" id="language" name="language" placeholder="Language..." value="{{$guild->Language}}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
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

            <hr>
            <a href="{{route('guildPlayer.add', ['id' => $guild->id])}}" type="button" class="btn btn-danger"><i class="nav-icon fas fa-plus"></i> Thêm mới Thành viên guild</a>

            <div class="row">
            
                <div class="col-12">   
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Danh sách Thành viên trong Guild</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px;">ID</th>
                                <th>Address</th>
                                <th>AvatarAddress</th>
                                <th>Rank</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @if(isset($list))
                            @foreach ($list as $item)
                            <tr>
                                <td>#{{$item->id}}</td>
                                <td>{{$item->Address}}</td>
                                <td>{{$item->AvatarAddress}}</td>
                                <td>{{$item->Rank}}</td>
                                <td>
                                    <a href="{{route('guildPlayer.edit', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-warning btn-xs">View/Edit</a>
                                    <a href="{{route('guildPlayer.delete', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-danger btn-xs" onclick="return ConfirmDelete()">Delete</a>
                                </td>
                            </tr> 
                            @endforeach 
                        @endif
                        
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            <!-- /.col -->
            </div>
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