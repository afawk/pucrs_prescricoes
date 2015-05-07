@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Selecione um paciente para realizar o atendimento</h1>
	</div>
	<ul>
		@foreach ($atendimentos as $atendimento)
			<li><a href="/atendimentos/{{ $atendimento->codigo }}">{{ $atendimento->paciente->nome }}</a></li>
		@endforeach
	</ul>
@stop
