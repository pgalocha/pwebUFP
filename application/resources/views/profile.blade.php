@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="/avatars/{{ $user->avatar }}" style="width: 200px; height:200px; float:left; border-radius:60%; margin-right:25px;">
              <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
                <form  action="/profile" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="pull-right btn btn-sm btn-danger" type="submit" value="DELETE">
                </form>

                <form action="/profile" method="POST">
                    <br>
                    <br><br><br>
                    name:<br>
                    <input type="text"  class="form-control" name="name" value={{ $user->name }}>
                    <br>
                    email:<br>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    <br>
                    contacto:<br>
                    <input type="text" name="contact" class="form-control" value="{{$user->contact}}">
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="submit" value="Guardar">
                </form>

            </div>
        </div>
    </div>

@endsection

