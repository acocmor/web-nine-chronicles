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
                  <h1 class="m-0">Thay đổi Version</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thay đổi Version</li>
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
                        <h3 class="card-title">Thay đổi Version</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                               @if(isset($version))

                               <form action="{{route('editVersion', ['id'=>$version->id])}}" method="POST">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="version">Thay đổi Version  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="version" name="version" placeholder="Version..." value="{{$version->version}}">
                                  </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</button>
                                  </div>
                              </form>
                              @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
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