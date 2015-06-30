@extends('layouts.master')

@section('content')
    <!-- <div class="page-header">
        <h1></h1>
    </div> -->

<!-- form class="form-horizontal" method="post" action="{{ route('criarPrescricaoPost', [$atendimento->codigo]) }}" -->
<div class="form-horizontal">
    <fieldset>
    <form class="form-prescricao" method="post" action="{{ route('criarPrescricaoPost', [$atendimento->codigo]) }}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <legend style="padding-bottom:10px;">
            Nova prescrição para '{{ $atendimento->paciente->nome }}'

            <button class="btn btn-danger pull-right btn-md" style="margin-right:30px;" type="reset">Limpar</button>
            <button class="btn btn-success pull-right btn-md" style="margin-right:10px;" type="submit">Salvar</button>
        </legend>
    </form>

    <div id="selectedList" class="alert alert-info" style="display:none">

    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="medicamento">Medicamento</label>
      <div class="col-md-8">
        <div class="input-group">
            <input id="medicamento" name="medicamento" type="search" class="form-control">
            <span class="input-group-addon">
                <a href="{{ route('searchableItem') }}" data-search="medicamento" rel="searchable">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    Buscar
                </a>
            </span>
        </div>
        <p class="help-block">Digite o nome do medicamento para efetuar a busca</p>
      </div>
    </div>

    <form id="medicamento_form" style="display:none;">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="paciente" value="{{ $atendimento->codigo }}" />
        <input type="hidden" name="elemento" value="medicamento" />

        <div class="form-group">
          <label class="col-md-4 control-label" for="apresentacao_medicamento">Apresentação</label>
          <div class="col-md-6">
            <select required id="apresentacao_medicamento" name="apresentacao" class="form-control">
                <option value="0">Selecione um medicamento</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="frequencia_medicamento">Frequência</label>
          <div class="col-md-6">
            <select required id="frequencia_medicamento" name="frequencia" class="form-control">
                <option value="0">Selecione um medicamento</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="via_medicamento">Via</label>
          <div class="col-md-6">
            <select required id="via_medicamento" name="via" class="form-control">
                <option value="0">Selecione um medicamento</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="quantidade_medicamento">Quantidade</label>
          <div class="col-md-6">
            <input required type="text" id="quantidade_medicamento" name="quantidade" class="form-control"/>
            <span class="help-block">Quantidade por dose. Opções: gramas, comprimidos, mililitros</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="condicao_medicamento">Condição restritiva</label>
          <div class="col-md-6">
            <input type="text" id="condicao_medicamento" name="condicao" class="form-control" />
            <span class="help-block">Caso excepcional na qual o medicamento deverá ser ministrado</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="send"></label>
          <div class="col-md-6">
            <button type="submit" id="add_medicamento" name="add_medicamento" class="btn btn-primary">Adicionar</button>
            <a id="cancel_medicamento" href="#">Cancelar</a>
          </div>
        </div>
    </form>

    <div class="form-group">
      <label class="col-md-2 control-label" for="aplicacao">Aplicação</label>
      <div class="col-md-8">
        <div class="input-group">
            <input id="aplicacao" name="aplicacao" type="search" class="form-control">
            <span class="input-group-addon">
                <a href="{{ route('searchableItem') }}" data-search="aplicacao" rel="searchable">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    Buscar
                </a>
            </span>
        </div>
        <p class="help-block">Digite o nome do injeção para efetuar a busca</p>
      </div>
    </div>

    <form id="aplicacao_form" style="display:none;">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="paciente" value="{{ $atendimento->codigo }}" />
        <input type="hidden" name="elemento" value="aplicacao" />

        <div id="aplicacao_form">
            <div class="form-group">
              <label class="col-md-4 control-label" for="apresentacao_aplicacao">Apresentação</label>
              <div class="col-md-6">
                <select id="apresentacao_aplicacao" name="apresentacao" class="form-control">
                    <option value="0">Selecione uma aplicação</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="frequencia_aplicacao">Frequência</label>
              <div class="col-md-6">
                <select id="frequencia_aplicacao" name="frequencia" class="form-control">
                    <option value="0">Selecione uma aplicação</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="via_aplicacao">Via</label>
              <div class="col-md-6">
                <select id="via_aplicacao" name="via" class="form-control">
                    <option value="0">Selecione uma aplicação</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="send"></label>
              <div class="col-md-6">
                <button type="submit" id="add_aplicacao" name="add_aplicacao" class="btn btn-primary">Adicionar</button>
              </div>
            </div>
        </div>
    </form>

    <form class="form-prescricao" method="post" action="{{ route('criarPrescricaoPost', [$atendimento->codigo]) }}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
        <hr>
          <label class="col-md-2 control-label" for="save_all"></label>
          <div class="col-md-8">
            <button class="btn btn-success" style="margin-right:10px;" type="submit">Salvar</button>
            <button class="btn btn-danger" style="margin-right:10px;" type="reset">Limpar</button>
          </div>
        </div>
    </form>
    </fieldset>
</div>

@stop
