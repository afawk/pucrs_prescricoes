@extends('layouts.master')

@section('content')
  <div class="col-md-3"></div>
  <div class="center-block col-md-6">

    <form class="form-horizontal" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <fieldset>

        <legend>Efetue seu acesso</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="userinpt">Usuário</label>
            <div class="col-md-8">
                <input id="userinpt" name="userinpt" value="{{ old('userinpt') }}" type="text" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="pssinpt">Senha</label>
            <div class="col-md-8">
                <input id="pssinpt" name="pssinpt" type="password" class="form-control input-md">
                <!-- <span class="help-block">help</span> -->
            </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="send"></label>
          <div class="col-md-8">
            <button type="submit" id="send" name="send" class="btn btn-success">Acessar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
          </div>
        </div>

        </fieldset>


        @if(Session::has('alert'))
          <div class="alert alert-danger">
            <p>{{ Session::get('alert') }}</p>
          </div>
        @endif
    </form>
  </div>
@stop
