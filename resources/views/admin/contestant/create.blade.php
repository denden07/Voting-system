@extends('layouts.admin')

@section('title')
    Add Contestant
@endsection


@section('css')
    <link href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{asset('ui/img/favicon.png')}}" rel="icon">
    <link href="{{asset('ui/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('ui/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('ui/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('ui/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ui/lib/gritter/css/jquery.gritter.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{asset('ui/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('ui/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('ui/lib/chart-master/Chart.js')}}"></script>
@endsection

@section('body')
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered">Sam Soffes</h5>
                <li class="mt">
                    <a class="active" href="{{url('admin/active/'.$event->id)}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Event</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="general.html">Add Event</a></li>
                        <li><a href="buttons.html">All Events</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Judges</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.judge.create',['event_id'=>$event->id])}}">Add Judge</a></li>
                        <li><a href="{{route('admin.judge.index')}}">All Judges</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Candidates</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.contestant.create',['event_id'=>$event->id])}}">Add Candidate</a></li>
                        <li><a href="buttons.html">All Candidates</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Criteria</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="general.html">Add Criteria</a></li>
                        <li><a href="buttons.html">All Criteria</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Users</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="general.html">Add User</a></li>
                        <li><a href="buttons.html">All Users</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Add Contestant for "{{$event->name}}"</h3>
            <!-- BASIC FORM VALIDATION -->

            <!-- FORM VALIDATION -->

            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> Fill out this form</h4>

                    <div class="form-panel">
                        <div class="form">

                            {!! Form::open(['method'=>'POST','route'=>['admin.contestant.save',$event->id],'files'=>true,'class'=>'cmxform form-horizontal style-form','id'=>'signupForm']) !!}
                            {{--<form action="{{route('admin.judge.save', ['event_id'=>$event->id])}}" method="post">--}}
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Firstname</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="firstname" name="firstname" type="text" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="middlename" class="control-label col-lg-2">Middlename</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="middlename" name="middlename" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Lastname</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="lastname" name="lastname" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="address" class="control-label col-lg-2">Adress</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="address" name="address" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="age" class="control-label col-lg-2">Age</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="age" name="age" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="contactNumber" class="control-label col-lg-2">Contact Number</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="contactNumber" name="contactNumber" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="number" class="control-label col-lg-2">Contestant Number</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="number" name="number" type="text" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="gender" class="control-label col-lg-2">Gender</label>
                                <div class="col-lg-10">
                                    {{--<input class="form-control " id="gender" name="gender" type="text" />--}}
                                    {!!  Form::select('sex_id',[''=>'Choose']+$genders,null,['class'=>'form-control','id'=>'gender'])!!}
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="photo_id" class="control-label col-lg-2">Photo</label>
                                <div class="col-lg-10">
                                    {!! Form::file('photo_id',null,['class'=>'form-control alert-up-pd']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    {!! Form::submit('Register Contestant',['class'=>'btn btn-theme']) !!}
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

@endsection


@section('js')

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('ui/lib/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('ui/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('ui/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('ui/lib/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('ui/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('ui/lib/jquery.sparkline.js')}}"></script>
    <!--common script for all pages-->
    <script src="{{asset('ui/lib/common-scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('ui/lib/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('ui/lib/gritter-conf.js')}}"></script>
    <!--script for this page-->
    <script src="{{asset('ui/lib/sparkline-chart.js')}}"></script>
    <script src="{{asset('ui/lib/zabuto_calendar.js')}}"></script>
    @if(session('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Success!',
                    // (string | mandatory) the text inside the notification
                    text: 'Contestant is Added',
                    // (string | optional) the image to display on the left
                    image: 'ui/img/ui-sam.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: false,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: 8000,
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                return false;
            });
        </script>
    @endif
    <script type="application/javascript">
        $(document).ready(function() {
            $("#date-popover").popover({
                html: true,
                trigger: "manual"
            });
            $("#date-popover").hide();
            $("#date-popover").click(function(e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function() {
                    return myDateFunction(this.id, false);
                },
                action_nav: function() {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                },
                    {
                        type: "block",
                        label: "Regular event",
                    }
                ]
            });
        });

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

@endsection