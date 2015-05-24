@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Selecione um paciente para realizar o atendimento</h1>
	</div>
  @if(count($atendimentos) > 0)
    <ul id="pacientes">
      @foreach ($atendimentos as $atendimento)
        <li><a href="{{ route('atendimentoShow', [$atendimento->codigo]) }}">{{ $atendimento->paciente->nome }}</a></li>
      @endforeach
    </ul>
  @else
    <div class="alert alert-danger">
      <p>Esta unidade não possui pacientes em atendimento</p>
    </div>
  @endif
@stop
