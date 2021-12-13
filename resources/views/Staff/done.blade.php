@extends('Staff.main')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Work Done</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <h3 class="card-title">Work Done</h3>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">

                                        <li class="page-item"><a href="" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="" class="page-link">1</a></li>
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
                                            <th>Buyer</th>
                                            <th>Price</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work as $pro)
                                            @if ($pro->status == 'Complete')
                                            
                                            <tr>
                                                <td>
                                                    <img style="border: 0.5px solid black"
                                                        src="{{ asset("User/assets/images/avatar/$pro->avatar") }}"
                                                        class="img-circle img-size-32 mr-2">
                                                    {{ $pro->fullname }}
                                                </td>
                                                <td>{{ $pro->total_money }}</td>
                                                <td>{{ $pro->deliveryaddress }}</td>
                                                <td>{{ $pro->phone }}</td>
                                                <td>{{ $pro->email }}</td>
                                                <td>{{ $pro->email }}</td>
                                            </tr>
                                                
                                            @endif

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
