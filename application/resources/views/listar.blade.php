<html lang="en">
<head>
    <meta charset="utf-8">
    <title>App Name</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>
<body>
                <div class="container">
                 <table class="table">
                        <thead>
                        <tr>
                         <td>Name</td>
                         <td>Email</td>
                     </tr>
                     </thead>

                     <tbody>
                     @foreach($users as $user)
                     <tr>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                     </tr>
                         @endforeach
                     </tbody>

                 </table>
                    {!! $users->render() !!}
                </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>
</html>
