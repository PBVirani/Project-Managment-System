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
                                        <h1>Account Settings</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Account Settings</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!--mail-Compose-contant-start-->
                        @foreach($data as $user)
                        <div class="row account-contant">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                                <div class="page-account-profil pt-5">
                                                    <div class="profile-img text-center rounded-circle">
                                                        <div class="pt-5">
                                                            <div class="bg-img m-auto">
                                                                <img src="assets/img/profile/{{$user->profile}}" class="img-fluid" alt="users-avatar">
                                                            </div>
                                                            <div class="profile pt-5">
                                                                <h4 class="mb-1 mt-4">Name : {{$user->name}}</h4>
                                                                <h5>Team : {{$user->team_name}}</h5>
                                                                <h5>Role : {{$user->role}}</h5>
                                                                <h5>Email : {{$user->email}}</h5>
                                                                <h5>Contact : {{$user->number}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                                <div class="page-account-form">
                                                    <div class="form-titel border-bottom p-3">
                                                        <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                                    </div>
                                                    <div class="p-4">
                                                     <form action="updateprofile" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="name1">Profile Image</label>
                                                                    <input type="file" name="image" class="btn btn-light">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="name1">Full Name</label>
                                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="title1">Team Role</label>
                                                                    <input type="text" class="form-control" name="role" value="{{$user->role}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="phone1">Phone Number</label>
                                                                    <input type="text" class="form-control" name="number" value="{{$user->number}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="email1">Email</label>
                                                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="phone1">Team Name</label>
                                                                    <input type="text" class="form-control" name="tname" value="{{$user->team_name}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="email1">Password</label>
                                                                    <input type="password" class="form-control" name="password" value="{{$user->password}}">
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary">Update Information</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--mail-Compose-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')