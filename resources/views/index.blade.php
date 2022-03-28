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
                  <h1 class="m-0">Danh sách Địa chỉ đăng ký</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
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
                      <h3 class="card-title">Danh sách</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width:20px;">ID</th>
                          <th>Address</th>
                          <th>Premium</th>
                          <th>Banned</th>
                          <th>Proteced</th>
                          <th>Ignoring Message</th>
                          <th>Premium End Block</th>
                          <th>Func</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                          @if(isset($list))
                            @foreach ($list as $item)
                              <tr>
                                <td>#{{$item->id}}</td>
                                <td>{{$item->Address}}</td>
                                @if($item->IsPremium)
                                <td><span style="color:green; font-weight:bold;";>YES</span></td>
                                @else
                                <td><span style="color:red";>No</span></td>
                                @endif

                                @if($item->IsBanned)
                                <td><span style="color:green; font-weight:bold;";>YES</span></td>
                                @else
                                <td><span style="color:red";>No</span></td>
                                @endif

                                @if($item->IsProteced)
                                <td><span style="color:green; font-weight:bold;";>YES</span></td>
                                @else
                                <td><span style="color:red";>No</span></td>
                                @endif

                                @if($item->IsIgnoringMessage)
                                <td><span style="color:green; font-weight:bold;";>YES</span></td>
                                @else
                                <td><span style="color:red";>No</span></td>
                                @endif
                                <td>{{$item->PremiumEndBlock}}</td>
                                <td>
                                  <a href="{{route('edit', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-warning btn-xs">View/Edit</a>
                                  <a href="{{route('delete', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-danger btn-xs" onclick="return ConfirmDelete()">Delete</a>
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