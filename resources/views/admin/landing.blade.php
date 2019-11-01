<!DOCTYPE html>
<html>
<head>
    <title>Select Event</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}" rel="stylesheet">
    <style>

        body{
            background: #eaeaea;
        }

        .banner{
            text-align: center;
            margin-top: 5%;
            font-family: 'Staatliches', cursive;
            font-size: 3em;

        }
        .pp{
            text-align: center;
            padding-bottom: 50px;
            font-family: 'Ruda', sans-serif;
        }
        .links{
            text-align: center;
            padding: 100px;
            background-color: #000000;
            border: 0px solid #1C6EA4;
            border-radius: 40px;
            color:white;
            transition: transform .2s;
            font-family: 'Oswald', sans-serif;
            text-decoration: none;
            -webkit-box-shadow: 19px 25px 9px 1px rgba(0,0,0,0.75);
            -moz-box-shadow: 19px 25px 9px 1px rgba(0,0,0,0.75);
            box-shadow: 19px 25px 9px 1px rgba(0,0,0,0.75);
            font-size: 1.5em;
        }
        .links:hover{
            transform: scale(1.5);
            color:white;
            text-decoration: none;
            -webkit-box-shadow: 19px 25px 37px 33px rgba(0,0,0,0.75);
            -moz-box-shadow: 19px 25px 37px 33px rgba(0,0,0,0.75);
            box-shadow: 19px 25px 37px 33px rgba(0,0,0,0.75);
        }
        .links1{
            margin-right: 20%;
            margin-left: 10%;
        }
        .links2{
            margin-left: 10%;
        }

        .logout{
            margin-left: 90% ;
            margin-top: 5px;
            font-family: 'Staatliches', cursive;
            font-size: 1.5em;

        }
    </style>

</head>


</html>

<body>

<div class="container-fluid">
 <div class="row">
     <div class="logout">
     <i class="fas fa-arrow-left"></i>
     <a  style="color: black" href="{{url('/logout')}}">Logout</a>
     </div>
 </div>

<h2 class="banner">Welcome back {{$user->name}}</h2>
<p class="pp"> What to do?</p>
<div class="container">

    <div class="row">
        <a class="links links1" href="{{route('admin.event.create')}}">Create Event</a>
        <a class="links links2" href="{{route('admin.event.index')}}">All events</a>
    </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>