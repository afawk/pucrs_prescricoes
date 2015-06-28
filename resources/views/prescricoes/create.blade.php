@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Nova prescrição para '{{ ucwords(strtolower($paciente->nome)) }}'</h1>
    </div>
    oi
@stop
