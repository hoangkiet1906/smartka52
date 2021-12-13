@extends('Admin.main')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Staff</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Staff</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- TO DO List -->



                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">All Staff</h3>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">

                                        <li class="page-item"><a href="" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="{{ route('Adstaff') }}"
                                                class="page-link">1</a></li>
                                        <li class="page-item"><a href="" class="page-link">&raquo;</a></li>

                                    </ul>
                                </div>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>Staff's name</th>
                                            <th>In process</th>
                                            <th>Accomplished</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($st as $s)

                                            <tr>
                                                <td>
                                                    <img style="border: 0.5px solid black"
                                                        src="{{ asset("Admin/dist/img/$s->avatar") }}"
                                                         class="img-circle img-size-32 mr-2">
                                                    {{ $s->fullname }}
                                                </td>
                                                <td>{{$count[$s->staff_name]}}</td>
                                                <td>{{$countc[$s->staff_name]}}</td>
                                                
                                            </tr>


                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@stop()
