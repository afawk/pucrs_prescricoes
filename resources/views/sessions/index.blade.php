@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Relatório de Acessos ao Sistema</h1>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h2>{{ $acessos['dia'] }}</h2>
            </div>
            <div class="panel-footer">Acessos no dia</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h2>{{ $acessos['mes'] }}</h2>
            </div>
            <div class="panel-footer">Acessos no mês</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h2>{{ $acessos['ano'] }}</h2>
            </div>
            <div class="panel-footer">Acessos no ano</div>
        </div>
    </div>

@stop