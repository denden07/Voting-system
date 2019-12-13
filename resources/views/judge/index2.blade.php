@extends('layouts.judge')

@section('title')
    Judge DASHBOARD
@endsection

@section('css')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <style>
        .selected{
            background-color: #4ECDC4;
            color:white;
        }


        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
                              /******** <- Remove this line *********/
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
        }

        .loader-wrapper {
            width: 100%;
            height: 1000px;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display:flex;
            justify-content: center;
            align-items: center;
            z-index: 99999999;
        }


        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(180deg);
            }

            50% {
                transform: rotate(180deg);
            }

            75% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes loader-inner {
            0% {
                height: 0%;
            }

            25% {
                height: 0%;
            }

            50% {
                height: 100%;
            }

            75% {
                height: 100%;
            }

            100% {
                height: 0%;
            }
        }

    </style>

@endsection


@section('body')
    <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>


        Loading...
    </div>
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="profile.html"><img style="width: 100px" src="{{$user->judge->photo ? $user->judge->photo->file:' Has no Photo'}}"  class="img-circle" width="180"></a></p>
                <h5 class="centered">{{$user->judge->firstname ." ".$user->judge->lastname }}</h5>
                <li class="mt">
                    <a class="active" href="{{url('admin/active/'.$event->id)}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Round</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('judge.select.criteria',['criteria_id'=>9])}}">Preliminary</a></li>
                        <li><a href="{{route('judge.select.criteria.final',['criteria_id'=>15])}}">Finals</a></li>
                    </ul>
                </li>


            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h1>{{$event->name}}</h1>

                        <h3>Contestant Score</h3>
                    </div>


                    {{--{!! Form::open(['method'=>'POST','route'=>['judge.score.save',$event->id],'files'=>true,'class'=>'cmxform form-horizontal style-form','id'=>'signupForm']) !!}--}}

                    {{--<table style="width:100%">--}}
                    {{--<tr>--}}
                    {{--<th>Contestant number</th>--}}
                    {{--<th>Contestant Name</th>--}}
                    {{--@foreach($criterias as $criteria)--}}
                    {{--<th>{{$criteria->name}}</th>--}}

                    {{--@endforeach--}}
                    {{--</tr>--}}

                    {{--@foreach($contestants as $contestant)--}}
                    {{--<tr>--}}
                    {{--<td>{{$contestant->number}}</td>--}}
                    {{--<td>{{$contestant->firstname ." ". $contestant->lastname}}</td>--}}
                    {{--@foreach($contestants as $key)--}}
                    {{--<input style="display: none" name="contestant_id[]" value="{{$key->number}}" type="text">--}}
                    {{--@endforeach--}}
                    {{--@foreach($criterias as $criteria)--}}
                    {{--<td><input style="width: 50px" name="score[]" type="text"></td>--}}
                    {{--<input style="display: none" name="criteria_id[]" value="{{$criteria->id}}" type="text">--}}

                    {{--@endforeach--}}

                    {{--</tr>--}}
                    {{--@endforeach--}}


                    {{--</table>--}}





                    {{--<div class="form-group">--}}
                    {{--<div class="col-lg-offset-2 col-lg-10">--}}
                    {{--{!! Form::submit('Submit Score',['class'=>'btn btn-theme']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}



                    <div style="width: 100%">
                        <ul class="nav nav-tabs">



                            @foreach($criterias as $criteria)
                                @php
                                    $selector = $criteriaSelector;
                                @endphp

                                @if($criteria == $selector )
                                        @php
                                        $selector ="selected"
                                        @endphp
                                <li style="font-size: 14px" class="{{$selector}}"><a class="{{$selector}}  href="{{route('judge.select.criteria',['criteria_id'=>$criteria->id])}}">{{$criteria->name}}</a></li>
                                    @else
                                        @php
                                            $selector =""
                                        @endphp
                                    <li style="font-size: 14px" class="{{$selector}}"><a class="{{$selector}}"  href="{{route('judge.select.criteria',['criteria_id'=>$criteria->id])}}">{{$criteria->name}}</a></li>
                                    @endif
                            @endforeach
                            <li style="background-color: #1b6d85"><a href="{{route('judge.score.compute',['event_id'=>$event->id])}}">Submit Score</a></li>
                        </ul>
                        <h2 style="margin-left: 300px">Score for {{$criteriaSelector->name}}</h2>





                        {{--<div class=" col-lg-5">--}}
                            {{--<ul style="margin-top: 50px" class="nav nav-tabs">--}}
                            {{--<li><a href="#">Contestant Number</a></li>--}}
                            {{--<li><a href="#">Contestant Name</a></li>--}}
                                {{--<li><a href="#">Score</a></li>--}}
                            {{--</ul>--}}

                            {{--{!! Form::open(['method'=>'POST','route'=>['judge.score.save',$event->id,$criteriaSelector->id],'files'=>true,'class'=>'cmxform form-horizontal style-form','id'=>'signupForm']) !!}--}}

                        {{--@foreach($contestants as $contestant )--}}
                                {{--<div class="form-group">--}}
                                    {{--<h2 style="margin-bottom:  -30px; " class="col-lg-3 col-lg-offset-1 ">{{$contestant->number}}</h2>--}}
                                    {{--<p class=" col-lg-3" for="usr">{{$contestant ->firstname." ".$contestant ->lastname}}</p>--}}
                                    {{--<div class="col-lg-3">--}}
                                        {{--<input style="width: 100px;margin-top: 24px" type="number" class="form-control input" name="score[]">--}}
                                        {{--<input style="display: none" name="contestant_id[]" type="text" value="{{$contestant->id}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}




                            {{--<div class="form-group">--}}
                                {{--<div style="margin-top: 6%" class="col-lg-offset-4 col-lg-10">--}}
                                    {{--{!! Form::submit('Submit Score',['class'=>'btn btn-theme']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}


                        {{--<div class="col-lg-5">--}}
                            {{--<ul style="margin-top: 50px" class="nav nav-tabs">--}}
                                {{--<li><a href="#">Contestant Number</a></li>--}}
                                {{--<li><a href="#">Contestant Name</a></li>--}}
                                {{--<li><a href="#">Score</a></li>--}}
                            {{--</ul>--}}

                            {{--{!! Form::open(['method'=>'POST','route'=>['judge.score.save',$event->id,$criteriaSelector->id],'files'=>true,'class'=>'cmxform form-horizontal style-form','id'=>'signupForm']) !!}--}}

                            {{--@foreach($contestants as $contestant )--}}
                                {{--<div class="form-group">--}}
                                    {{--<h2 style="margin-bottom:  -30px; " class="col-lg-1  ">{{$contestant->number}}</h2>--}}
                                    {{--<p class=" col-lg-2">{{$contestant ->firstname." ".$contestant ->lastname}}</p>--}}
                                    {{--<div class="col-lg-2">--}}
                                        {{--<input style="width: 100px;margin-top: 24px" type="number" class="form-control input" name="score[]">--}}
                                        {{--<input style="display: none" name="contestant_id[]" type="text" value="{{$contestant->id}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}




                            {{--<div class="form-group">--}}
                                {{--<div style="margin-top: 6%" class="col-lg-offset-4 col-lg-10">--}}
                                    {{--{!! Form::submit('Submit Score',['class'=>'btn btn-theme']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        @if(session('success'))

                            <div class="alert alert-success" role="alert">
                                {{session('success','Please Proceed to next Criteria')}}
                            </div>
                        @endif


    <div style="width: 100%">
                        <div style="padding: 50px" class="col-lg-6 ">
                            <h2>WOMEN</h2>

                            <table style="width: 100%">

                                <tr>
                                    <th width="50%" style="margin-right: 2px">Contestant #</th>
                                    <th width="50%">Name</th>
                                    <th width="25%">Score</th>
                                </tr>
                                {!! Form::open(['method'=>'POST','route'=>['judge.score.save',$event->id,$criteriaSelector->id],'files'=>true,'class'=>'cmxform form-horizontal style-form','id'=>'signupForm','onsubmit'=>'checkForBlank()']) !!}

                                @foreach($contestants as $contestant )
                                <tr>
                                    <td width="50%">{{$contestant->number}}</td>
                                    <td width="50%">{{$contestant ->firstname." ".$contestant ->lastname}}</td>
                                    <td width="25%"> <input id="scoreW" style="width: 100px;margin-top: 24px" type="number" class="form-control input" min="75" max="100" name="score[]" value="0"></td>
                                    <input style="display: none" name="contestant_id[]" type="text" value="{{$contestant->id}}">

                                </tr>
                                @endforeach
                            </table>


                        </div>

                        <div style="padding: 50px" class="col-lg-6 ">
    <h2>MEN</h2>

                            <table style="width: 100%">

                                <tr>
                                    <th width="25%">Contestant #</th>
                                    <th width="25%">Name</th>
                                    <th width="25%">Score</th>
                                </tr>

                                @foreach($contestants2 as $contestant2 )
                                    <tr>
                                        <td width="25%">{{$contestant2->number}}</td>
                                        <td width="25%">{{$contestant2 ->firstname." ".$contestant2 ->lastname}}</td>
                                        <td width="25%"> <input id="scoreM" style="width: 100px;margin-top: 24px" type="number" min="75" max="100" class="form-control input" name="score2[]" value="0"></td>
                                        <input style="display: none" name="contestant_id2[]" type="text" value="{{$contestant2->id}}">

                                    </tr>
                                @endforeach
                            </table>


                        </div>

                        <div class="form-group">
                        <div style="margin-top: 6%" class="col-lg-offset-4 col-lg-10">
                        {!! Form::submit('Submit Score',['class'=>'btn btn-theme']) !!}
                        </div>
                        </div>



                    </div>





                    </div>


















                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->
                <!-- **********************************************************************************************************************************************************
                    RIGHT SIDEBAR CONTENT
                    *********************************************************************************************************************************************************** -->
                <div class="col-lg-2 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <div class="donut-main" style="margin-bottom: 200px;">
                        <h3>Criteria of the contest</h3>
                        <canvas id="newchart" height="130" width="130"></canvas>
                        <script>
                            var doughnutData = [{
                                value: 70,
                                color: "#4ECDC4"
                            },
                                {
                                    value: 30,
                                    color: "#fdfdfd"
                                }
                            ];
                            var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <h4 style="margin-top: 50px">Preliminary</h4>
                        @if($criterias)
                            @foreach($criterias as $criteria)


                                <p>{{$criteria->name ." "."="." ". $criteria->percentage."%"}}</p>


                            @endforeach
                        @endif

                        <h4 style="margin-top: 50px">Finals</h4>
                        @if($criterias2)
                            @foreach($criterias2 as $criteria)


                                <p>{{$criteria->name." "."="." ". $criteria->percentage."%"}}</p>

                            @endforeach
                        @endif


                    </div>
                    <!--NEW EARNING STATS -->
                    {{--<div class="panel terques-chart">--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="chart">--}}
                                {{--<div class="centered">--}}
                                    {{--<span>TODAY EARNINGS</span>--}}
                                    {{--<strong>$ 890,00 | 15%</strong>--}}
                                {{--</div>--}}
                                {{--<br>--}}
                                {{--<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--new earning end-->--}}
                    {{--<!-- RECENT ACTIVITIES SECTION -->--}}
                    {{--<h4 class="centered mt">RECENT ACTIVITY</h4>--}}
                    {{--<!-- First Activity -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<muted>Just Now</muted>--}}
                                {{--<br/>--}}
                                {{--<a href="#">Paul Rudd</a> purchased an item.<br/>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Second Activity -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<muted>2 Minutes Ago</muted>--}}
                                {{--<br/>--}}
                                {{--<a href="#">James Brown</a> subscribed to your newsletter.<br/>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Third Activity -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<muted>3 Hours Ago</muted>--}}
                                {{--<br/>--}}
                                {{--<a href="#">Diana Kennedy</a> purchased a year subscription.<br/>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Fourth Activity -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<muted>7 Hours Ago</muted>--}}
                                {{--<br/>--}}
                                {{--<a href="#">Brando Page</a> purchased a year subscription.<br/>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- USERS ONLINE SECTION -->--}}
                    {{--<h4 class="centered mt">TEAM MEMBERS ONLINE</h4>--}}
                    {{--<!-- First Member -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<img class="img-circle" src="img/ui-divya.jpg" width="35px" height="35px" align="">--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<a href="#">DIVYA MANIAN</a><br/>--}}
                                {{--<muted>Available</muted>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Second Member -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<img class="img-circle" src="img/ui-sherman.jpg" width="35px" height="35px" align="">--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<a href="#">DJ SHERMAN</a><br/>--}}
                                {{--<muted>I am Busy</muted>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Third Member -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<img class="img-circle" src="img/ui-danro.jpg" width="35px" height="35px" align="">--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<a href="#">DAN ROGERS</a><br/>--}}
                                {{--<muted>Available</muted>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Fourth Member -->--}}
                    {{--<div class="desc">--}}
                        {{--<div class="thumb">--}}
                            {{--<img class="img-circle" src="img/ui-zac.jpg" width="35px" height="35px" align="">--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<p>--}}
                                {{--<a href="#">Zac Sniders</a><br/>--}}
                                {{--<muted>Available</muted>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- CALENDAR-->--}}
                    {{--<div id="calendar" class="mb">--}}
                        {{--<div class="panel green-panel no-margin">--}}
                            {{--<div class="panel-body">--}}
                                {{--<div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">--}}
                                    {{--<div class="arrow"></div>--}}
                                    {{--<h3 class="popover-title" style="disadding: none;"></h3>--}}
                                    {{--<div id="date-popover-content" class="popover-content"></div>--}}
                                {{--</div>--}}
                                {{--<div id="my-calendar"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!-- / calendar -->
                </div>
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
            </p>
            <div class="credits">
                <!--
                  You are NOT allowed to delete the credit link to TemplateMag with free version.
                  You can delete the credit link only if you bought the pro version.
                  Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
                  Licensing information: https://templatemag.com/license/
                -->
                Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
            </div>
            <a href="index.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->

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
    <script type="text/javascript">
        $(document).ready(function() {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Welcome to Dashio!',
                // (string | mandatory) the text inside the notification
                text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
                // (string | optional) the image to display on the left
                image: 'img/ui-sam.jpg',
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
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut(2000);
    });
</script>

    <script>

        function checkForBlank() {

            if(document.getElementById('scoreW').value== "" || document.getElementById('scoreM').value== ""){
               alert('Oops! You missed a score there!');
               document.getElementById('scoreW').style.borderColor= red;
                return false;
            }

        }

    </script>




@endsection

