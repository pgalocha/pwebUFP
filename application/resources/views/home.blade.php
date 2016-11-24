@extends('layouts.app')

<script src="/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <center><img src="http://openplus.ca/images/person-flat.png" alt="Smiley face" height="200" width="200"></center>
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <center>  <div class="panel-body">
                    You are logged in
                    @if(Auth::user())
                       {{ Auth::user()->name}}
                        @endif
                    !
                </div>
                <a  href="http://localhost:8000/"> Voltar ao HomePage!</a></center>
                </button>
            </div>
        </div>
    </div>
</div>
<body onload="checkCookie()"></body>
<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function checkCookie() {
        var user = getCookie("username");
        if (user != "") {

        } else {
            swal("Bem vindo!", "Está logado!", "success");
            setCookie("username", "Logado", 365);

        }
    }
</script>
@endsection
