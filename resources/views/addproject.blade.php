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
                                        <h1>Add Project Details</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Project </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!--mail-Compose-contant-start-->
                        <div class="row account-contant">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            
                                            <div class="col-xl-12 col-md-6 col-12 border-t border-right">
                                                <div class="page-account-form">
                                                    <div class="form-titel border-bottom p-3">
                                                        <h5 class="mb-0 py-2">Project</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <form action="addproject1" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                
                                                                <div class="form-group col-md-12">
                                                                    <label for="name1">Project Name</label>
                                                                    <input type="text" class="form-control" name="name" placeholder="Enter Project Name" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="title1">Details</label>
                                                                    <textarea type="text" class="form-control" name="pdetails" placeholder="Enter Project Details" required></textarea>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="phone1">Start Date</label>
                                                                    <input type="date" class="form-control" name="sdate" placeholder="Enter Start Date" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="email1">Due Date</label>
                                                                    <input type="date" class="form-control" name="ddate" placeholder="Enter Due Date" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary form-control">Add Project</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-Compose-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')