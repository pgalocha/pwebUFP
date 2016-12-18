<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Rent&Play</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>

                <div class="container">
                 <table class="table">
                        <thead>
                        <tr>
                         <td>Name</td>
                         <td>Email</td>
                            <td>Contact</td>
                     </tr>
                     </thead>

                     <tbody>
                     @foreach($users as $user)
                     <tr id="mostra{{$user->id}}">
                         <label type="hidden" id="id" value="{{$user->id}}" name="id"></label>
                        <td ><a href="/home/user/{{ $user->id }}"> {{ $user->name }} </a></td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->contact }}</td>
                         <td><button   id="mostra" value="{{ $user->id }}"  type="button" class="delete-modal btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Apagar</button></td>
                     </tr>
                         @endforeach
                     </tbody>

                 </table>
                    {!! $users->render() !!}
                </div>



 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <!-- Compiled and minified JavaScript -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.delete-modal').on('click',function(){
                            var valorid = $(this).val();
                            var token='{{Session::token()}}';
                            var str1= "#mostra";
                            var res = str1.concat(valorid);
                                    jQuery.ajax({
                                        method: 'POST',
                                        dataType: 'application/json',
                                        url: '/userdelete',
                                        data: {_token: token, id: valorid },
                                        success: function(data) {
                                            $( "tr" ).remove(res);
                                        },
                                        error: function(data) {
                                            $( "tr" ).remove(res);
                                        },
                                    })


                        });
                    });
                </script>
</body>
</html>
