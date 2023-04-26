@extends('admin_layout.admin')

@section('content')
{{Form::hidden('',$increment=1)}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste Des Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">employees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste Des Employees</h3>
              </div>
              @if(Session::has('status'))
                <div class="alert alert-success">
                  {{Session::get('status')}}
                </div>
                @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom De L'employee</th>
                    <th>Email</th>
                    <th>Le nom d'admin</th>
                    <th>Entreprise</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($invitations as $invitation)
                    <tr>
                    <td>{{$invitation->id}}</td>
                    <td>{{$invitation->name}}</td>
                    <td>{{$invitation->email}}</td>
                    <td>{{$invitation->admin->name}}</td>
                    <td>{{$invitation->entreprise->name}}</td>
                    <td>
                      @if(!$invitation->validated)
                      <a href="{{url('/delete_invitation/'.$invitation->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                      @else
                      Invitation validé
                      @endif
                      {{--{!!Form::open(['action'=>'App\Http\Controllers\CategoryController@deletecategory' , 'method'=>'DELETE'])!!}
                      {{Form::hidden('id',$category->id)}}  
                      {{Form::submit('Delete' ,['class'=>'btn btn-danger','id'=>'delete' ])}}
                      {!!Form::close()!!}--}}
                    </td> 
                  </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Nom De L'employee</th>
                    <th>Email</th>
                    <th>Le nom d'admin</th>
                    <th>Entreprise</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('style')
<link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endsection

@section('scripts')
<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<script src="backend/dist/js/bootbox.min.js"></script>
<!-- page script -->
<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection