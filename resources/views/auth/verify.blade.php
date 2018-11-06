@extends('../layouts/app')
@section('titulo','Completar usuario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4>¡Hola, <strong>{{$user->name}}</strong>!</h4>
            <div class="alert alert-info">
                Su cuenta esta casi lista, unicamente falta configurar una contraseña.
                <br>
                Usuario: {{$user->username}} <br>
                Email: {{$user->email}}
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Configurar contraseña</div>

                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{url('user/complete/'.$user->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Completar registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection