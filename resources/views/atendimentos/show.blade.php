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

	@if (count($prescricoes_lista) > 0)
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    Lista de Prescrições

		    <a class="btn btn-success" style="margin-left:30px;" href="{{ route('criarPrescricao', [$atendimento->codigo]) }}">Criar Nova Prescrição</a>
		  </div>
		  <div class="panel-body">
		  	<ul>
				@foreach ($prescricoes_lista as $prescricao)
					<li>
						Prescrição de número {{ $prescricao->codigo }},
						via <strong>{{ $prescricao->medico->nome }}</strong>,

						@if ($prescricao->data_hora_liberacao)
							com liberação em {{ date('d/m/Y \a\s H:i:s', strtotime($prescricao->data_hora_liberacao)) }}.
						@else
							aguardando liberação.
						@endif
					<a href="{{ route('visualizarPrescricao', [$prescricao->atendimento->codigo, $prescricao->codigo]) }}">Ver mais</a></li>
				@endforeach
			</ul>
		  </div>
		</div>
	@else
		<div class="alert alert-warning">
			<p>
				<a class="btn btn-success" style="margin-right:30px" href="{{ route('criarPrescricao', [$atendimento->codigo]) }}">Criar Prescrição</a>
				Este paciente não possui nenhuma prescrição cadastrada
			</p>
		</div>
	@endif
@stop
