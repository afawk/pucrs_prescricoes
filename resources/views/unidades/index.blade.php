@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Selecione uma unidade para iniciar o atendimento</h1>
	</div>
	<ul id="unidades">
		@foreach ($unidades as $unidade)
			<li><a href="{{ route('atendimentoUnidades', [$unidade->codigo]) }}">{{ $unidade->nome }}</a></li>
		@endforeach
	</ul>
@stop
