@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>
			{{ $atendimento->paciente->nome }} <span class="badge">{{ $atendimento->unidade->nome }}</span>

		@if (empty($atendimento->data_fim))
			<a id="prescr_alta" class="btn btn-primary pull-right" style="margin-right:30px;" href="#">Indicar alta</a>
		@endif
		</h1>
	</div>

	@if (empty($atendimento->data_fim))
	<div rel="prescr_alta" class="panel panel-info" style="display:none;">
		<div class="panel-heading">
			Descreva a alta do paciente
		</div>
		<div style="margin:10px;">
			<form class="form-horizontal" method="post" action="{{ route('atendimentoPrescreverAlta', [$atendimento->codigo]) }}">
			  <input type="hidden" name="atendimento_id" value="{{ $atendimento->codigo }}"/>
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <fieldset>
			  	<p>Ao dar alta ao paciente, <strong>todas</strong> as suas prescrições serão finalizadas</p>
				<div class="form-group">
				  <div class="col-md-4">
				    <textarea class="form-control" required id="descr_alta" name="descr_alta" style="width:530px; height:150px;"></textarea>
				  </div>
				</div>

				<div class="form-group">
				  <div class="col-md-8">
				    <button id="enviar" type="submit" name="Enviar" class="btn btn-success">Salvar</button>
				    <button id="cancelar_prescr_alta" type="reset" name="Cancelar" class="btn btn-danger">Cancelar</button>
				  </div>
				</div>

			  </fieldset>
			</form>
		</div>
	</div>
	@endif

	<dl id="paciente" class="dl-horizontal">
		<dt>Sexo</dt>
		<dd>{{ sexo($atendimento->paciente->sexo) }}</dd>
		<dt>CPF</dt>
		<dd>{{ cpf($atendimento->paciente->cpf) }}</dd>
		<dt>Data de Nascimento</dt>
		<dd>{{ date("d/m/Y", strtotime($atendimento->paciente->data_nascimento)) }}</dd>
		<dt>Idade</dt>
		<dd>{{ idade($atendimento->paciente->data_nascimento) }}</dd>
		<dt>Iniciado em</dt>
		<dd>{{ date('d/m/Y H:i:s', strtotime($atendimento->data_inicio)) }}</dd>

		@if (!empty($atendimento->data_fim))
		<dt>Finalizado em</dt>
		<dd>{{ date('d/m/Y H:i:s', strtotime($atendimento->data_fim)) }}</dd>

			@if (!empty($atendimento->descricao_alta))
				<dt>Dado alta por</dt>
				<dd>"{{ $atendimento->descricao_alta }}"</dd>
			@endif
		@endif
	</dl>

	@if (count($prescricoes_lista) > 0)
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    Lista de Prescrições

			@if (empty($atendimento->data_fim))
		    	<a class="btn btn-success" style="margin-left:30px;" href="{{ route('criarPrescricao', [$atendimento->codigo]) }}">Criar Nova Prescrição</a>
		    @endif
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
	@elseif (empty($atendimento->data_fim))
		<div class="alert alert-warning">
			<p>
				<a class="btn btn-success" style="margin-right:30px" href="{{ route('criarPrescricao', [$atendimento->codigo]) }}">Criar Prescrição</a>
				Este paciente não possui nenhuma prescrição cadastrada
			</p>
		</div>
	@endif
@stop
