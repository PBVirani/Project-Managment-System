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
                                        <h1>Task List</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Task
                                                    List</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start task list contant -->
                        
                        <div class="col-md-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Add New Task</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                </div>
                            </div>
                        <div class="row">
                            
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
                                               
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end task list contant -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')