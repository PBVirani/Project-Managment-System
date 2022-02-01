@include('header')
            
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        
                        <!-- begin row -->
                        <div class="row">
                            
                           
                            <div class="col-lg-12 col-xxl-12 h-100 ">
                                
                                <div class="card card-statistics h-50 m-b-30 bg-pink">
                                    <div class="card-body">
                                        <div class="d-flex p-3">
                                            <div class="mr-2">
                                                @foreach($project as $row)
                                                    <h3 class="text-white mb-1">Name : {{$row->project}}</h3>
                                                    <p class="text-white">Details : {{$row->details}}</p>
                                                    <p class="text-white">Start Date : {{$row->start_date}}</p>
                                                    @if($row->status == 0)
                                                        <p class="text-white">Due Date : {{$row->due_date}}</p>
                                                    @else
                                                        <p class="text-white">Finised Date : {{$row->due_date}}</p>
                                                    @endif
                                            </div>
                                        </div>
                                            @if($row->status == 0)
                                                <a href="completeproject\{{$row->project_id}}" class="btn btn-block btn-warning">Working</a>
                                            @else     
                                                <h5 class="btn btn-block btn-success text-white">Complete</h5>
                                            @endif
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Team Details -->
                        <div class="row">
                            <div class="col-xl-6 col-xxl-6 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Team Member</h4>
                                        </div>
                                            <a class="btn btn-round btn-inverse-primary btn-xs" href="addmember">Add new </a>
                                    </div>
    
                                    @foreach($data as $row)
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-20">
                                            <div class="col-12 col-sm-2 mb-3 mb-sm-0">
                                                <div class="bg-img">
                                                    <img class="img-fluid" src="assets/img/profile/{{$row->profile}}" alt="user">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5 mb-3 mb-sm-0">
                                                <h4 class="mb-0">{{$row->name}}</h4>
                                                <span>{{$row->email}}</span>
                                                
                                            </div>
                                            <div class="col-5">
                                                <label class="badge badge-primary-inverse">{{$row->role}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Project Activity-->
                            <div class="col-xl-6 col-xxl-6 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Project Activity</h4>
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <ul class="activity">

                                            @foreach($activity as $row)
                                            @if($row->status == 1)
                                            <li class="activity-item primary">
                                                <div class="activity-info">
                                                    <h5 class="mb-0">{{$row->work}}</h5>
                                                    <span>{{$row->time}}</span>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h3>Add Task</h3>
                                        <form action="addtask" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder=" Enter Task Name" name="task">
                                                </div>
                                                <div class="col">
                                                        <select class="form-control" name="pname">
                                                            <option selected>Project Name</option>
                                                            @foreach($project as $project1)
                                                                @if($project1->team_id == Session::get('logteam')) 
                                                                    <option value="{{$project1->project_id}}">{{$project1->project}}</option>
                                                                @endif
                                                            @endforeach
                                                            
                                                        </select>
                                                </div>
                                                <div>
                                                    <button type="submit" class=" btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            <!--Project Task List-->
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
                                                        <span class="font-weight-bold">User</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Update User</span>
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
                                                        @foreach($data as $user)
                                                            @if($user->user_id == $row->user_id) 
                                                             {{$user->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    
                                                    <td>
                                                        @foreach($data as $user)
                                                            @if($user->user_id == $row->update_id) 
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