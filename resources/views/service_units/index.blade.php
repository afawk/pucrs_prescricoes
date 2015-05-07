@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Selecione uma unidade para iniciar o atendimento</h1>
	</div>
	<ul>
		@foreach ($unidades as $unidade)
			<li><a href="/unidades/{{ $unidade->id }}">{{ $unidade->nome }}</a></li>
		@endforeach
	</ul>
@stop
