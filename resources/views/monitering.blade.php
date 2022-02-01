@include('header')
            
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                       
                        <!-- begin row -->
                        
                        <div class="row">
                            <a href="addproject" class="mb-5 btn btn-block btn-info py-3 ">Add Project</a>
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
                                                            <th>Project Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        
                                                        @foreach($data as $row)
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
                        <!-- end row -->

                        <div class="row">
                            
                            <div class="col-xxl-12 mb-30">
                                <div class="card card-statistics h-100 mb-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Complete projects</h4>
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
                                                            <th>Project Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        
                                                        @foreach($data as $row)
                                                        @if($row->status == 1)
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
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
           
@include('footer')