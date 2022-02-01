@include('header')
            
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="user-welcome d-block d-xl-flex flex-nowrap align-items-center">
                                    <div class="bg-img mb-2 mb-xl-0 mr-3">
                                        <img class="img-fluid rounded" src="assets/img/profile/{{Session::get('logprofile');}}" alt="user">
                                    </div>
                                    <div class="page-title mb-2 mb-xl-0">
                                        <h1 class="mb-1">Welcome Back , {{Session::get('logdata');}}  </h1>
                                       
                                       
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- end page title -->
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                       
                        <div class="row">
                            
                        <div class="col-xxl-12 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Ongoing projects</h4>
                                        </div>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="scrollbar scroll_dark">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table mb-0 table-borderless">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Project Name </th>
                                                            <th> Start Date </th>
                                                            <th> Due Date </th>
                                                            <th>Team </th>
                                                            <th>Status</th>
                                                            <th>Clients</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        
                                                        @foreach($projectdata as $row)
                                                            @if($row->status == 0)
                                                                <tr>
                                                                        <td> <a href="project-details/{{$row->project_id}}">{{$row->project}}</a></td>
                                                                        <td>{{$row->start_date}}</td>
                                                                        <td>{{$row->due_date}}</td>
                                                                        <td>{{$row->team_id}}</td>
                                                                        @if($row->status == 0)
                                                                            <td><label class="badge badge-info-inverse">In Progress</label></td>
                                                                        @else
                                                                            <td><label class="badge badge-info-inverse">Complete</label></td>
                                                                        @endif
                                                                        <td>{{$row->details}}</td>
                                                                </tr>
                                                            @endif
                                                       @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-xxl-6 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Team Member</h4>
                                        </div>
                                    </div>

                                    @foreach($data as $row)
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-20">
                                            <div class="col-12 col-sm-2 mb-3 mb-sm-0">
                                                <div class="bg-img">
                                                    <img class="img-fluid" src="assets/img/profile/{{$row->profile}}" alt="user">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-7 mb-3 mb-sm-0">
                                                <h4 class="mb-0">{{$row->name}}</h4>
                                                <span>{{$row->email}}</span>
                                            </div>
                                            <div class="col-3">
                                                <h3><span class="badge badge-primary">{{$row->role}}</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xl-6 col-xxl-6 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Team Activity</h4>
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <ul class="activity">

                                            @foreach($activity as $row)
                                            @if($row->status == 1)
                                                @foreach($projectdata as $pj)
                                                    @if($pj->status == 0)
                                                        @if($row->project_id == $pj->project_id)
                                                            <li class="activity-item success">
                                                                <div class="activity-info">
                                                                    <h5 class="mb-0">{{$row->work}} , {{$pj->project}}</h5>
                                                                    <span>{{$row->time}}</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card card-statistics task-list-contant">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table task-table mb-0">
                                            <thead class="border-bottom">
                                                <tr>
                                                    <td>
                                                                <span class="font-weight-bold">All
                                                                    Task</span>
                                                        
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Date</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Project</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">User</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Status</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Action</span>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody class="text-muted mb-0">
                                                
                                               @foreach($activity as $row) 
                                                @if($row->status == 0)
                                                <tr>
                                                    <td>
                                                            <label class="form-check-label" for="Check2">{{$row->work}}</label>
                                                    </td>
                                                    <td>
                                                        {{$row->time}}
                                                    </td>
                                                    <td>
                                                       @foreach($project as $project1)
                                                        @if($project1->project_id == $row->project_id) 
                                                            {{$project1->project}}
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                   
                                                    <td>
                                                        @foreach($data as $user)
                                                            @if($user->user_id == $row->user_id) 
                                                             {{$user->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    
                                                   

                                                    <td>
                                                        @if($row->status == 1)
                                                            <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Complete</span>
                                                        @else
                                                            <span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">Working</span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                        @if($row->status == 0)
                                                            <a href="tasklist1/{{$row->id}}/{{$row->status}}" class="btn btn-icon btn-sm btn-inverse-success"><i class="fa fa-check"></i></a>
                                                        @else
                                                            <a href="tasklist1/{{$row->id}}/{{$row->status}}" class="btn btn-icon btn-sm btn-inverse-danger"><i class="fa fa-times"></i></a>
                                                        @endif
                                                        <a href="edittask/{{$row->id}}" class="btn btn-icon btn-sm btn-inverse-warning"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                               @endif
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
           
@include('footer')