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

                <br>
                <br>
                <br>
                <form action="/profile" method="POST">

                    <br><br><br>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input id="contact" type="contact" class="form-control" name="contact" value="{{ $user->contact }}" required>

                            @if ($errors->has('contact'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>



                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="_method" type="hidden" value="PUT">
                    <br>
                    <center><input type="submit" value="Guardar"></center>
                </form>

                <br>
                <center><p><a href="/profile/changepass">Mudar password?</a></p></center>

                <center><p><a href="#">Apagar conta?</a></p></center>

            </div>
        </div>
    </div>

@endsection

