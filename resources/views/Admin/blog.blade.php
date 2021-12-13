@extends('Admin.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blog Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Blog</li>
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
                    <div class="col-lg-6">
                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    Blog List
                                </h3>

                                <div class="card-tools">
                                  
                                    {{-- {{$blogs->links()}}  --}}
                                     <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="{{ route('Adblog') }}" class="page-link">1</a></li>
                                        <li class="page-item"><a href="{{ route('Adblog') }}{{ '?page=2' }}" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    @foreach ($blogs as $blog)                                        
                                    <li>
                                        <!-- checkbox -->
                                        {{-- <div class="icheck-primary d-inline ml-2"> --}}
                                        <form class="icheck-primary d-inline ml-2" action="{{ route('changeStatus', $blog->idblog) }}" id="checkstatus" method="POST">
                                            @csrf
                                            @if ($blog->status)
                                                <input type="checkbox" value="" name="todo1" id="todoCheck1" onchange=" submit();" >
                                                <input type="hidden" name="idstatus" value="0">
                                            @else
                                                <input type="checkbox" value="" name="todo1" id="todoCheck1" checked onchange=" submit();">
                                                <input type="hidden" name="idstatus" value="1">
                                            @endif
                                           
                                            <label for="todoCheck1"></label> 
                                        </form>
                                        {{-- </div> --}}
                                        <!-- todo text -->
                                        <span class="text" style="display:inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50%; vertical-align: top">{{ $blog->title }}</span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger"><i class="far fa-clock"></i> {{ substr($blog->date, 0, 10) }}</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools"> 
                                            <form action="{{ route('deleteBlog') }}" >
                                                <button type="submit" class="btn text-danger" id="deleteblog" name="deleteblog" value="{{ $blog->idblog }}"  >
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            
                                                <button type="button" class="btn text-danger p-0"  data-toggle="modal" data-target="#m{{ $blog->idblog }}" >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </form>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                        
                                    </li>
                                    <div class="modal" id="m{{ $blog->idblog }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                        
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Blog</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                        
                                                    <!-- Modal body -->
                                                    <form action="{{ route('updateBlog', $blog->idblog) }}" id="formUpdate" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h5>Blog</h5>
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="uptitle" id="uptitle" value="{{ $blog->title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Author</label>
                                                                <input type="text" class="form-control" name="upauthor" value="{{ $blog->author }}">
                                                            </div>
                                        
                                                            <div class="form-group">
                                                                <label for="">Content</label>
                                                                <textarea class="form-control" name="upcontent" rows="5">{{ $blog->content }}</textarea>
                                                            </div>
                                        
                                                            <div class="form-group">
                                                                <label for="">Tag</label>
                                                                <input type="text" class="form-control" name="uptag" value="{{ $blog->tag }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Image</label> <br>
                                                                <input type="file" id="imageblog" accept=".jpg" name="upimage" required />
                                                            </div>
                                        
                                                            <h5>Blog Detail</h5>
                                                            <div class="form-group">
                                                                <label for="">Content 1</label><br>
                                                                <textarea class="form-control" name="upcontent1" id="upcontent1" required
                                                                    placeholder="Enter detailed content 1 for the blog" rows="5">{{ $blog->ct1 }}
                                                                        </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Content 2</label>
                                                                <textarea class="form-control" name="upcontent2" id="upcontent2" required
                                                                    placeholder="Enter detailed content 2 for the blog" rows="5">{{ $blog->ct2 }}
                                                                        </textarea>
                                        
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Content 3</label>
                                                                <textarea class="form-control" name="upcontent3" id="upcontent3" required
                                                                    placeholder="Enter detailed content 3 for the blog" rows="5">{{ $blog->ct3 }}
                                                                        </textarea>
                                        
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Image 1</label> <br>
                                                                <input type="file" name="upimage1" id="upimage1" accept=".jpg" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Image 2</label> <br>
                                                                <input type="file" name="upimage2" id="upimage2" accept=".jpg" required />
                                                            </div>
                                                        </div>
                                        
                                                        <!-- Modal footer"  onclick="sendUpdate()"-->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">


                        <div class="card" style="height: 360px;">
                            <div class="card-header border-0">
                                <h3 class="card-title">OVERVIEW</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-success text-xl">
                                        <i class="ion ion-ios-book-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-up text-success"></i> 14%
                                        </span>
                                        <span class="text-muted">Post Rate</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-warning text-xl">
                                        <i class="ion ion-ios-eye-outline" style="font-size: 42px"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-up text-warning"></i> 5%
                                        </span>
                                        <span class="text-muted">User View Rate</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <p class="text-danger text-xl">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-down text-danger"></i> 4%
                                        </span>
                                        <span class="text-muted">User Comment Rate</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title"><b>Add Blog</b></h3>
                                <div class="card-tools">

                                    <form action="{{ route('insertBlog') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tag</label>
                                                    <input type="text" name="tag" class="form-control" id="tag" placeholder="Enter tag">
                                                </div>
                                            </div>   
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <div class="card-body table-responsive p-0" style="height: 340px">
                                                <div ng-app="ckeDemo">
                                                    <div ng-controller="ckeController as cke" layout="column">
                                                        <div ckeditor="cke.options" id="contentck" ng-model="cke.content" ready="cke.onReady()"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Image</label> <br>
                                            <input type="file" id="image"  name="image" accept=".jpg" required/>
                                        </div>
                                        
                                        <p>
                                            <h5>Blog Detail</h5>
                                        </p>
                                        <div class="form-group">
                                            <label for="">Content 1</label><br>
                                            <textarea class="form-control" name="content1" id="content1" required placeholder="Enter detailed content 1 for the blog"  rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Content 2</label>
                                            <textarea class="form-control" name="content2" id="content2" required placeholder="Enter detailed content 2 for the blog"  rows="5"></textarea>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="">Content 3</label>
                                            <textarea class="form-control" name="content3" id="conten3" required placeholder="Enter detailed content 3 for the blog"  rows="5"></textarea>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Image 1</label> <br>
                                                    <input type="file" name="image1"  id="image1" accept=".jpg"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Image 2</label> <br>
                                                    <input type="file" name="image2" id="image2" accept=".jpg"  required/>
                                                </div>
                                            </div>    
                                        </div>
                                        
                                        <button type="submit" id="insertblog" class="btn btn-primary">Submit</button>
                                        <input type="hidden" name="content" id="content" value="">
                                    </form>
                                </div>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.min.js">
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-aria.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-messages.min.js">
    </script>
    <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.5/angular-material.min.js"></script>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.8/full-all/ckeditor.js" ></script>
    <script src="{{ asset('Admin/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        
        $(document).ready(function () {
            
            $('#insertblog').click(function () {
                var con = CKEDITOR.instances.contentck.document.getBody().getText();
                // alert(con);
                // $('#content').value = con;
                $('input[name="content"]').val(con);
            });
        });
        
    </script>
    

@stop()
