@extends('layouts.admin')

@section('contenido')
    <div class="rows">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session()->has('msj'))
                <div class="alert alert-danger" role="alert">{{session('msj')}}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="alert alert-danger" style="text-align: center" role="alert">
                CONSULTA DE VOTOS POR LISTA - CONSEJALES
            </div>
        </div>
    </div>

    @livewire('consulta.lista-index')

@endsection

@section('scripts')
    
@endsection
