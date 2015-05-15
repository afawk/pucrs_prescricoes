@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>{{ $atendimento->paciente->nome }} <span class="badge">{{ $atendimento->unidade->nome }}</span></h1>
	</div>
	<dl id="paciente" class="dl-horizontal">
		<dt>Sexo</dt>
		<dd>{{ sexo($atendimento->paciente->sexo) }}</dd>
		<dt>CPF</dt>
		<dd>{{ cpf($atendimento->paciente->cpf) }}</dd>
		<dt>Data de Nascimento</dt>
		<dd>{{ date("d/m/Y", strtotime($atendimento->paciente->data_nascimento)) }}</dd>
		<dt>Idade</dt>
		<dd>{{ idade($atendimento->paciente->data_nascimento) }}</dd>
	</dl>
	<div class="alert alert-info">
		<p>
			Este paciente não possui nenhuma prescrição cadastrada
			<a class="btn btn-primary" href="javascript:alert('Prescrição não foi implementada')">Criar Prescrição</a>
		</p>
	</div>
@stop
