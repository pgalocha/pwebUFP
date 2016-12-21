<!DOCTYPE html>
<html>
<body>


<form action="user" method="POST">
    ID:<br>
    <input type="text" name="id" value="">
    <br>
    <input type="submit" value="Submit">
    <input type="hidden" value="{{csrf_token()}}" name="_token" >


</form>
</body>
</html>



