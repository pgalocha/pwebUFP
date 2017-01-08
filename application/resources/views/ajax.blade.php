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

<button   id="mostra" value=""  type="button" class="delete-modal btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Apagar</button>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-modal').on('click',function(){
            $('.delete-modal').on('click',function(){

                var token='{{Session::token()}}';

                jQuery.ajax({
                    method: 'POST',
                    dataType: 'application/json',
                    url: '/ajax',
                    data: {_token: token ,idade : 12},
                    success: function(result) {
                        alert("Ola");
                    },
                    error: function(result) {
                        alert("Ola");
                        console.log(result);
                    },
                })


            });
        });
    });
</script>
</html>
