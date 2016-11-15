<form action="/admin" method="POST">
    <input type='text' name='name' value='' placeholder='inserir nome'><br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>
