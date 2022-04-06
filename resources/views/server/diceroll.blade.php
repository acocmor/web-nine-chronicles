@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Server Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Server Settings</li>
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
                    @if (session('loi'))
                        <div class="alert alert-danger">
                                {{session('loi')}}
                        </div>
                    @endif
            
              <div class="row">
                <div class="col-12">   
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Settings Server</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <h3>DiceRoll Server Now: <span style="color: red; font-size:24px; font-weight:bold; padding-left:15px">{{$list->diceroll}}</span></h3>
                        <h3>TrialPremium Server Now: <span style="color: red; font-size:24px; font-weight:bold; padding-left:15px">{{$list->TrialPremium}}</span></h3>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('postServer')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label for="diceroll">Thay đổi DiceRoll  <span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" id="diceroll" name="diceroll" placeholder="DiceRoll..." value="{{$list->diceroll}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="trialPremium">Thay đổi TrialPremium  <span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" id="trialPremium" name="trialPremium" placeholder="TrialPremium..." value="{{$list->TrialPremium}}">
                                      </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</button>
                                      </div>
                                  </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="col-12">   
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Thêm mới Version</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('postVersion')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label for="version">Thêm mới Version  <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" id="version" name="version" placeholder="Version..." value="">
                                      </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-edit"></i> Add</button>
                                      </div>
                                  </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                <div class="col-12">   
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Danh sách Version</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width:20px;">ID</th>
                          <th>Version</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                          @if(isset($versions))
                            @foreach ($versions as $item)
                              <tr>
                                <td>#{{$item->id}}</td>
                                <td><span style="color: red; font-size:24px;">{{$item->version}}</span></td>
                                <td>
                                  <a href="{{route('changeVersion', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-warning btn-xs">View/Edit</a>
                                  <a href="{{route('deleteVersion', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-danger btn-xs" onclick="return ConfirmDelete()">Delete</a>
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
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  function ConfirmDelete() {
      var x = confirm("Bạn có muốn xoá?");
      if (x)
          return true;
      else
          return false;
  }
</script>
@endsection