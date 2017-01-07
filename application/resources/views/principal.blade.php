<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rent&Play</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="/css/Style.css" rel="stylesheet">
    <link href="/css/videofilesoya.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
</head>

<body>


<div class="sect sectOne" id="homeSection" >
    <div class="background-wrap">
        <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
            <source src="/css/4k.mp4" type="video/mp4">
            Video not supported
        </video>
    </div>
    <div class="content">
        <h1>Rent&Play</h1>
        <p>Maior Portal de Aluguer de espacos desportivos!</p>
        <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4 text-center">
            <button onclick="demoVisibility()" id="aluguer" name="singlebutton" class="btn btn-primary"> Alugar Campo</button>
        </div>
    </div>


</div>


<div class="subSection" id="aluguerSection">
    <div class="container">
        <br>
        <br>
        <br>
<center>

        <input  type="text" id="datetimepicker" class="" />
        <button onclick="outra()" id="fazaluguer" name="singlebutton" class="btn btn-primary">Verificar Horário</button>
        <p1 id="disponibilidade"> Horário Disponível!</p1>
</center>
        <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
    </div>

</div>
<div class="sect SectThree" id="we" ></div>
<div class="subSection Footer" id="footerSection" >
    <div class="container">
        <p class="float-xs-right">
            <br>
            <br>

        </p>
        <br>
        <br>
        <br><br><br>
        <p> Designed by <a href="https://www.facebook.com/pgalocha">Pedro Galocha© </a></p>
    </div>
</div>
</body>

<script>
$(document).ready(function () {
    demoDisplay();
    setBindings();
})

function demoDisplay() {
    document.getElementById("aluguerSection").style.display = "block";
    document.getElementById("disponibilidade").style.display = "none";
}
function demoVisibility() {
    document.getElementById("aluguerSection").style.display = "block";
}
function setBindings() {

    $('button').click(function(e) {
        e.preventDefault();
        var sectionID=e.currentTarget.id+"Section";
        $('html body').animate({
            scrollTop: $('#' + sectionID).offset().top
        },1000)

    })
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" ></script>
<script src="js/jquery.datetimepicker.full.js"></script>


<script>
    $("#datetimepicker").datetimepicker();
    function outra() {
        var date=document.getElementById("datetimepicker").value;
        alert(date);
        var teste=String(date);
        var urso  = teste.replace(" ", '/');
        alert(urso);
        $.ajax({url: "/hi", data: { field1: date, field2 : "hello2"} ,success: function(result){
            $("#div1").html(result);
        },error: function(result){
            $("#div1").html(result);
        }});


        $.get("/date?="+ date ,function(result){
            console.log(result);
        });




    }
</script>
</html>
