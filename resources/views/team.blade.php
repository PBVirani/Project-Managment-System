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
                                        <h1>Team Members</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Pages
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Team Details</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    
                                </div>
                                <!-- end page title -->
                                
                            </div>
                            <a class="btn btn-round btn-inverse-primary ml-2" href="addmember">Add New Member</a>
                        </div>
                        <!-- end row -->

                        <!--start contact contant-->
                        
                        
                        <div class="row mt-5">
                            
                            @foreach($data as $row)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="card card-statistics employees-contant px-2">
                                        <div class="card-body pb-5 pt-4">
                                            <div class="text-center">
                                                <div class="text-right">
                                                    <a href="manage-team/{{$row->user_id}}" class="btn btn-round btn-inverse-primary">Update</a>
                                                </div>
                                                <div class="pt-1 bg-img m-auto"><img src="assets/img/profile/{{$row->profile}}" class="img-fluid" alt="employees-img"></div>
                                                <div class="mt-3 employees-contant-inner">
                                                    <h4 class="mb-1">{{$row->name}}</h4>
                                                    <h5 class="mb-0 text-muted">{{$row->email}}</h5>
                                                    <div class="mt-3 ">
                                                        <span class="badge badge-pill badge-success-inverse px-5 py-3">{{$row->team_name}}</span>
                                                        <span class="badge badge-pill badge-primary-inverse px-5 py-3">{{$row->role}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                       
                        <!--end employees contant-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')