@extends('layouts.admin')
@section('title')
    Select Judge
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
    <style>
        .total-score{
            display: flex;
        }


        .final-heading-items{
           font-size: 16px;
            text-align: center;
        }
        .final-heading{
            border-spacing: 25px;

            border-collapse: separate;
        }

        .final-contestant-number{
            font-size: 16px;
            margin-left: 50px;
            margin-right: 60px;

        }
        .final-contestant-number-items{
            margin-top: 10px;
            font-size: 16px;
        }

        .final-contestant-name-items{
            margin-top: 10px;
            font-size: 16px;
        }

        .final-contestant-score-items{
            margin-top: 10px;
            font-size: 16px;
        }


    </style>

@endsection

@section('body')
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
                        <li><a href="{{route('admin.criteria.create',['event_id'=>$event->id])}}">Add Criteria</a></li>
                        <li><a href="buttons.html">All Criteria</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Scores</span>
                        <i style="margin-left: 30%" class="fas fa-arrow-down"></i>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.show.judge.score',['event_id'=>$event->id])}}">Prelims</a></li>
                        <li><a href="buttons.html">Finals</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>


    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h1>{{$event->name}}</h1>
                        <h3>Total Score For Round 1</h3>
                    </div>


                    <table class="final-heading">
                        <tr>
                            <th class="final-heading-items">Contestant Number</th>
                            <th class="final-heading-items">Contestant Name</th>
                            <th class="final-heading-items">Total Score</th>
                        </tr>
                    </table>

<div class="total-score">
                <ul class="final-contestant-number">
                    @if($contestants)
                        @foreach($contestants as $contestant)
                    <li class="final-contestant-number-items">{{$contestant->number}}</li>
                        @endforeach
                    @endif

                </ul>

                    <ul class="final-contestant-name">
                        @if($contestants)
                            @foreach($contestants as $contestant)
                                <li class="final-contestant-name-items">{{$contestant->firstname ." ". $contestant->lastname}}</li>
                            @endforeach
                        @endif
                    </ul>

                    <ul class="final-contestant-score">
                        @if($finalScores)
                            @foreach($finalScores as $finalScore)
                                <li class="final-contestant-score-items">{{$finalScore->finalScore}}</li>
                            @endforeach
                        @endif
                    </ul>


</div>
                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->
                <!-- **********************************************************************************************************************************************************
                    RIGHT SIDEBAR CONTENT
                    *********************************************************************************************************************************************************** -->
                <div class="col-lg-3 ds">
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
                    <div class="panel terques-chart">
                        <div class="panel-body">
                            <div class="chart">
                                <div class="centered">
                                    <span>TODAY EARNINGS</span>
                                    <strong>$ 890,00 | 15%</strong>
                                </div>
                                <br>
                                <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                            </div>
                        </div>
                    </div>
                    <!--new earning end-->
                    <!-- RECENT ACTIVITIES SECTION -->
                    <h4 class="centered mt">RECENT ACTIVITY</h4>
                    <!-- First Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>Just Now</muted>
                                <br/>
                                <a href="#">Paul Rudd</a> purchased an item.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Second Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>2 Minutes Ago</muted>
                                <br/>
                                <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Third Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>3 Hours Ago</muted>
                                <br/>
                                <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>7 Hours Ago</muted>
                                <br/>
                                <a href="#">Brando Page</a> purchased a year subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- USERS ONLINE SECTION -->
                    <h4 class="centered mt">TEAM MEMBERS ONLINE</h4>
                    <!-- First Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DIVYA MANIAN</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Second Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DJ SHERMAN</a><br/>
                                <muted>I am Busy</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Third Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DAN ROGERS</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Zac Sniders</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / calendar -->
                </div>
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
    </section>



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

@endsection