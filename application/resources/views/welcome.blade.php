<!DOCTYPE html>
<html lang="en">
<head>

    <title>Rent&Play</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/main1.css" rel="stylesheet">
    <link href="/css/videofilesoya.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
        #panel, #flip {
            padding: 5px;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
            text-align: center;
        }

        #panel {
            padding: 50px;
            display: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Rent&Play</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <li class="dropdown"><a class="glyphicon glyphicon-user" data-toggle="dropdown" href="{{ url('/login')}}"> {{ auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(!Auth::user()->isAdmin())
                        <li><a href="{{ url('/profile') }}" ><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        @endif
                            @if(Auth::user()->isAdmin())
                        <li><a href="{{ url('/home') }}" ><span class="glyphicon glyphicon-user"></span> Profile</a></li>

                    @endif
                        <li>

                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                </li>
           @else
                <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            @endif
        </ul>
    </div>
</nav>

<section>


</section>

<center><div id="slide" class="container">
    <br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 90%" align="center">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox"  width="960" height="600">
            <div class="item active">
                <img src="https://scontent.flis1-1.fna.fbcdn.net/t31.0-8/15000758_10209072287182824_5468782221213110371_o.jpg" alt="Chania" width="960" height="600">
            </div>

            <div class="item">
                <img src="https://scontent.flis1-1.fna.fbcdn.net/t31.0-8/15000787_10209072288822865_6124278828509177536_o.jpg" alt="Chania" width="960" height="600">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</center>


<input type="button" onclick="demoDisplay()" value="Hide text with display property">
<input type="button" onclick="demoVisibility()" value="Hide text with visibility property">
   <h1><div id="hi" class="horainicial"><input type="datetime-local" name="horaini"></div></h1>
   <h1><div class="horafinal"><input type="datetime-local" name="horafim"></div></h1>




</body>
    @extends('footer')
    @section('ft')
        @stop


<script>
    function demoDisplay() {
        document.getElementById("slide").style.display = "none";
    }

    function demoVisibility() {
        document.getElementById("slide").style.display = "block";
    }
</script>
</html>
