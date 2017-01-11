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
    <script src="/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
</head>

<body>

<div class="sect sectOne" id="homeSection" >
    <div class="background-wrap">
        <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
            <source  src="/media/teste.mp4" value="intro_movie" type="video/mp4">
            Video not supported
        </video>
    </div>
    <div class="content">
        <h1>Rent&Play</h1>
        <p>Maior Portal de Aluguer de espacos desportivos!</p>

        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4 text-center">
            @if(!Auth::user())
            <button onclick="location.href = '/home';" id="loginbtn" name="singlebutton" class="btn btn-danger"> Login</button>
            @endif
            @if(Auth::user())
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                        Logout
                    </a>



                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            <button onclick="demoVisibility()" id="aluguer" name="singlebutton" class="btn btn-primary"> Alugar Campo</button>

        </div>



    </div>


</div>


<div class="subSection" id="aluguerSection">

    <div class="col-lg-4">
        {{Form::open(array('url'=> '','files'=> true))}}
        <div class="form-group">
            <label for="">Cidades</label>
            <select class="form-control input-sm" name="cidade" id="cidade">
                @foreach($cidades as $cidade)
                    <option value="{{$cidade->nome}}">{{$cidade->nome}}</option>
                    @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="">Campos</label>
            <select class="form-control input-sm" name="campo" id="campo">
                <option value=""></option>
            </select>

        </div>

        {{Form::close()}}
    </div>
    <div class="container">
        <br>
        <br>
        <br>
        <center>

            <input  type="text" id="datetimepicker" class="" />
            <button onclick="outra()" id="fazaluguer" name="singlebutton" class="btn btn-primary">Verificar Horário</button>
            <p1 id="disponibilidade"></p1>
        </center>
        <div id="div1"><h2></h2></div>
    </div>
    <div id="fotoSection">

       <div id="nomecampo"></div>
    </div>



</div>
<div class="sect SectThree" id="we" >




</div>
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
            $( "#alugame" ).remove();
            var camponome = $('#campo').find(":selected").text();


            var date=document.getElementById("datetimepicker").value;
            var teste=String(date);
            var urso  = teste.replace(" ", '/');
            var res = urso.split("/");
            var ano=res[0];
            var mes=res[1];
            var dia=res[2];
            var hora=res[3];
            var res1 = ano.concat("-");
            var res2 = res1.concat(mes);
            var res3 = res2.concat("-");
            var res4 = res3.concat(dia);
            var token='{{Session::token()}}';
            jQuery.ajax({
                method: 'POST',
                dataType:"json",
                url: '/schedule',
                data: {_token: token ,date : res4 ,hora: hora, campo:camponome},
                success: function(result) {
                    console.log(result);
                    $("#div1").html(result['info']);
                    if(result['info']=="Está Livre"){
                        $("#aluguerSection").append('<button onclick="aluga()" id="alugame" name="singlebutton" class="btn btn-primary">Fazer Aluguer!</button>');
                    }
                },
                error: function(result) {
                    console.log(result);
                    $("#div1").html(result);
                },
            })



        }
</script>
<script>

    $("#cidade").on('change',function (e) {
        $( "#fotoSection" ).remove();
        $("#aluguerSection").append('<div id="fotoSection"></div>');
        var cid_id= e.target.value;
        //ajax
        $.get('cidade?cid_id='+ cid_id, function (data) {
            $("#campo").empty();

            $.each(data,function(index, subObj){

                $("#campo").append(' <option value="'+subObj.id+'">'+subObj.nome+'</option>');


            });

        });
    });


</script>
<script>
    function aluga(){
        var token='{{Session::token()}}';
        var camponome = $('#campo').find(":selected").text();
        var date=document.getElementById("datetimepicker").value;
        var teste=String(date);
        var urso  = teste.replace(" ", '/');
        var res = urso.split("/");
        var ano=res[0];
        var mes=res[1];
        var dia=res[2];
        var hora=res[3];
        var res1 = ano.concat("-");
        var res2 = res1.concat(mes);
        var res3 = res2.concat("-");
        var res4 = res3.concat(dia);

        jQuery.ajax({
            method: 'POST',
            dataType:"json",
            url: '/ordernew',
            data: {_token: token ,date : res4 ,hora: hora, campo:camponome},
            success: function(result) {
                if(result['auth']==true){

                    swal({
                                html:true,
                                title: "Pedido de Aluguer",
                                text: "<br>Date: "+res4+"<br>Hora: "+hora+"<br>Campo: "+camponome+"<br>Preço: "+result.custo["0"].preco+"",
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            },
                            function(){
                                jQuery.ajax({
                                    method: 'POST',
                                    dataType:"json",
                                    url: '/makereserv',
                                    data: {_token: token ,date : res4 ,hora: hora, campo:camponome, preco: result.custo["0"].preco},
                                    success: function(result) {

                                        if(result['success']==true){
                                            setTimeout(function(){
                                                swal("Aluguer Concluido!");
                                            }, 2000);
                                        }else{
                                            setTimeout(function(){
                                                swal("Aluguer não Concluido!");
                                            }, 2000);
                                        }


                                    },
                                    error: function(result) {

                                    },
                                })

                            });


                }else{
                    alert("Não está logado");
                    // similar behavior as clicking on a link
                    window.location.href = "http://localhost:8000/login";
                }
            },
            error: function(result) {

            },
        })






    }




</script>



</html>
