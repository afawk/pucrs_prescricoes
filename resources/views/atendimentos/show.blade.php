@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>{{ $atendimento->paciente->nome }} <span class="badge">{{ $atendimento->unidade->nome }}</span></h1>
	</div>
	<div class="alert alert-info">
		<p>Aqui vão as informações do paciente</p>
	</div>
@stop
