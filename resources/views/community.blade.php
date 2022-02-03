@include('header')
<!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>PMS</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">community</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                      
                                        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#loginModal">Add Question</button>
             
                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Put Question</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="addquestion" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="modelemail">Problem Name</label>
                                                <input type="text" class="form-control" name="problem">
                                            </div>
                                            <div class="form-group">
                                                <label for="modelpass">Problem Details</label>
                                                <textarea type="text" class="form-control" name="details"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics mail-contant">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            
                                            <div class="col-md-12  col-xxl-12 border-md-t">
                                                <div class="mail-content  border-right border-n h-100">
                                                    
                                                    <div class="mail-msg scrollbar scroll_dark">
                                                    @foreach($data as $row)
                                                        @foreach($user as $row1)
                                                        @if($row1->user_id == $row->user_id)
                                                            <div class="mail-msg-item">
                                                                <a href="problem-show/{{$row->problem_id}}/{{$row->user_id}}">
                                                                    <div class="media align-items-center">
                                                                        <div class="mr-3">
                                                                            <div class="bg-img">
                                                                                <img src="assets/img/profile/{{$row1->profile}}" class="img-fluid" alt="user">
                                                                            </div>
                                                                        </div>
                                                                        <div class="w-100">
                                                                            <div class="mail-msg-item-titel justify-content-between">
                                                                                
                                                                                    <p>{{$row1->name}}</p>
                                                                               
                                                                                <p class="d-none d-xl-block">{{$row->time}} 
                                                                                    @if(Session::get('loguser') == $row1->user_id)
                                                                                        <a href="deletequestion/{{$row->problem_id}}" class="btn btn-icon btn-sm btn-inverse-danger"><i class="fa fa-trash"></i></a>
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <h5 class="mb-0 my-2">{{$row->problem_name}}</h5>
                                                                            <p>{{$row->problem}}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')