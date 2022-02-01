@include('header')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <h1>Edit Task</h1>
                                <!-- begin page title -->
                                    <form action="updatetask" method="POST">
                                        @csrf
                                        @foreach($activity as $ac)
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Project Name</label>
                                                @foreach($project as $pj)
                                                    @if($pj->project_id == $ac->project_id)
                                                        <input type="text" class="form-control" placeholder="Enter Project Name" disabled name="pname" value="{{$pj->project}}">
                                                    @endif
                                                @endforeach
                                            </div> 

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Task Name</label>
                                                <input type="text" class="form-control"  placeholder="Enter Task Name" name="task" value="{{$ac->work}}" autofocus>
                                            </div>
                                            @foreach($user as $u)
                                                    @if($u->user_id == $ac->user_id)
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Team Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Team Name" disabled name="tname" value="{{$u->team_name}}">
                                                        </div> 

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">User Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" disabled name="uname" value="{{$u->name}}">
                                                        </div> 
                                                    @endif
                                                    @if($u->user_id == $ac->update_id)
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Last Update By User</label>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" disabled name="update" value="{{$u->name}}">
                                                        </div> 
                                                    @endif
                                            @endforeach
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @endforeach
                                    </form>
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