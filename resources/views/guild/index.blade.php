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
                  <h1 class="m-0">Danh sách GUILD</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách GUILD</li>
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
            
                    <a href="{{route('guild.add')}}" type="button" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Thêm mới Guild</a>
                    <hr>
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
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Tag</th>
                                  <th>Desc</th>
                                  <th>MinLevel</th>
                                  <th>Type</th>
                                  <th>Link discord</th>
                                  <th>Language</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  
                                  @if(isset($list))
                                    @foreach ($list as $item)
                                      <tr>
                                        <td>#{{$item->id}}</td>
                                        <td><img src="{{asset('Guilds/'.$item->Tag.'.png')}}" alt="{{$item->Tag}}"></td>
                                        <td>{{$item->Name}}</td>
                                        <td>{{$item->Tag}}</td>
                                        <td>{{$item->Desc}}</td>
                                        <td>{{$item->MinLevel}}</td>
                                        <td>{{$item->Type}}</td>
                                        <td>{{$item->Link}}</td>
                                        <td>{{$item->Language}}</td>
                                        <td>
                                          <a href="{{route('guild.edit', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-warning btn-xs">View/Edit</a>
                                          <a href="{{route('guild.delete', ['id'=>$item->id])}}" type="button" class="btn btn-block btn-danger btn-xs" onclick="return ConfirmDelete()">Delete</a>
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