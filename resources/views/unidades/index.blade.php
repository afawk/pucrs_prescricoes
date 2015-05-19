@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Selecione uma unidade para iniciar o atendimento</h1>
	</div>
	<ul id="unidades">
		@foreach ($unidades as $unidade)
			<li><a href="/unidades/{{ $unidade->codigo }}/atendimentos">{{ $unidade->nome }}</a></li>
		@endforeach
	</ul>
@stop
