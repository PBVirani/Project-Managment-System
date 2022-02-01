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
                                        <h1>Chat</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index">
                                                        <i class="ti ti-home"></i>
                                                    </a>
                                                </li>
                                                <li aria-current="page" class="breadcrumb-item active text-primary">
                                                    Chat
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!--mail-read-contant-start-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            
                                            <div class="col-xl-12 col-xxl-12 border-md-t">
                                                <div class="app-chat-msg">
                                                    <div class="d-flex align-items-center justify-content-between p-3 px-4 border-bottom">
                                                        <div class="app-chat-msg-title">
                                                            <h4 class="mb-0">{{Session::get('logtname')}}</h4>
                                                            <p class="text-success">
                                                                Online
                                                            </p>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="scrollbar scroll_dark app-chat-msg-chat p-4">
                                                        @foreach($data as $row)
                                                           
                                                        @if($row->user_id != Session::get('loguser'))
                                                            @foreach($user as $row1)
                                                                @if($row1->user_id == $row->user_id)
                                                                    <div class="chat">
                                                                        <div class="chat-img">
                                                                            <a data-placement="left" data-toggle="tooltip" href="javascript:void(0)">
                                                                                <div class="bg-img">
                                                                                    <img class="img-fluid" src="assets/img/profile/{{$row1->profile}}" alt="user">
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-msg">
                                                                            <div class="chat-msg-content ">
                                                                                <p>{{$row->message}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                        <div class="chat chat-left justify-content-end">
                                                            <div class="chat-msg">
                                                                <div class="chat-msg-content">
                                                                    <p>{{$row->message}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <form method="POST" action="chat1">
                                                    @csrf
                                                <div class="app-chat-type">
                                                    <div class="input-group mb-0 ">
                                                        
                                                            <input class="form-control" placeholder="Type here..." type="text" name="chat">
                                                            <div class="input-group-prepend">
                                                                <button class="input-group-text" type="submit">
                                                                
                                                                        <i class="fa fa-paper-plane"></i>
                                                                </button>
                                                            </div>

                                                    </div> 
                                                    
                                                </div><form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-read-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@include('footer')