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
                        <!-- end row -->
                        
                        <div class="row">
                            
                            @foreach($data as $row)
                                @foreach($user as $row1)
                                    <div class="mail-chat py-5 px-5">
                                            <div class="media align-items-center">
                                                <div class="bg-img mr-3">
                                                    <img src="assets/img/profile/{{$row1->profile}}" class="img-fluid" alt="user">
                                                </div>
                                                <div>
                                                    <h4 class="mb-0">{{$row1->name}}</h4>
                                                    <p>{{$row->time}}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex justify-content-between">
                                                <div>
                                                    <h3>{{$row->problem_name}}</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="mb-2">{{$row->problem}}</p>
                                            </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div><hr />
                        <h2>Solution : </h2>
                        @foreach($solution as $row)
                            @foreach($user as $row1)
                                <div class="row">
                                    <div class="mail-chat py-5 px-5">
                                            <div class="media align-items-center">
                                                <div class="bg-img mr-3">
                                                    <img src="assets/img/profile/{{$row1->profile}}" class="img-fluid" alt="user">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">{{$row1->name}}</h5>
                                                    <p>{{$row->time}}</p>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-4 d-flex justify-content-between">
                                                <div>
                                                    <h4>Solution : {{$row->solution}}</h4>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Message : {{$row->message}}</h6>
                                            </div>
                                    </div>
                                </div>
                                <hr/>
                            @endforeach
                        @endforeach

                        <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Give Solution</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="addsolution" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Solution</label>
                                                <textarea type="text" name="solution" class="form-control"  placeholder="Enter Solution"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Message</label>
                                                <textarea type="text" name="message" class="form-control"  placeholder="Enter Message"></textarea>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
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