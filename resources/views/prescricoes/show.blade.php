@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>
    Prescrição #{{ $prescricao->codigo }}, em nome de {{ $prescricao->atendimento->paciente->nome }}
    <a class="btn btn-primary pull-right" href="{{ route('atendimentoShow', [$prescricao->atendimento->codigo]) }}">Ver lista</a>
  </h1>
</div>

@if ($prescricao->data_hora_liberacao != null)
    <div class="alert alert-success" role="alert">
        Prescrição médica liberada dia <strong>{{ date('d/m/Y \a\s H:i:s', strtotime($prescricao->data_hora_liberacao)) }}</strong> e com validade até <strong>{{ date('d/m/Y', strtotime($prescricao->data_hora_liberacao . ' +1 day')) }}</strong> ao meio-dia
    </div>
@else
    <div class="alert alert-warning" role="alert">
        Prescrição médica aguardando liberação
        <button class="btn btn-success pull-right btn-sm" type="submit">Liberar prescrição</button>
    </div>
@endif

<nav>
  <ul class="pager">
    @if ($prescricao_anterior)
        <li class="previous"><a href="{{ route('visualizarPrescricao', [$prescricao->atendimento->codigo, $prescricao_anterior->codigo]) }}"><span aria-hidden="true">&larr;</span> Anterior</a></li>
    @else
        <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Anterior</a></li>
    @endif

    @if ($prescricao_proximo)
        <li class="next"><a href="{{ route('visualizarPrescricao', [$prescricao->atendimento->codigo, $prescricao_proximo->codigo]) }}">Próxima <span aria-hidden="true">&rarr;</span></a></li>
    @else
        <li class="next disabled"><a href="#">Próxima <span aria-hidden="true">&rarr;</span></a></li>
    @endif
  </ul>
</nav>

<div class="panel panel-primary">
  <div class="panel-heading">
    Prescrição do atendimento #{{ $prescricao->atendimento->codigo }}, iniciado dia {{ date('d/m/Y \a\s H:i:s', strtotime($prescricao->atendimento->data_inicio)) }}
  </div>
  <div class="panel-body">
    <p>Sob responsabilidade do doutor <strong>{{ $prescricao->medico->nome }}</strong></p>

    @foreach ($prescricao->itens as $item)
        <p>
            <strong>{{ $item->item->nome }}</strong>
            <ul>
                <li>{{ $item->via->descricao }}</li>
                <li>{{ $item->apresentacao->descricao }}</li>
                <li>{{ $item->frequencia->descricao }}</li>
                <li>{{ $item->posologia }}</li>
                @if ($item->observacao)
                    <li style="color:red;">{{ $item->observacao }}</li>
                @endif
            </ul>
        </p>
    @endforeach
  </div>
</div>

@stop
