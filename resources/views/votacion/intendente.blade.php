@extends('layouts.admin')

@section('contenido')

    <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session()->has('msj'))
                <div class="alert alert-danger" role="alert">{{session('msj')}}</div>
            @endif
        </div>
    </div>
    
    <form action="{{route('intendente.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="panel panel-danger">            
                <div class="panel-body">
                    
                    @livewire('votacion.indendente-index')

                    <hr style="width: 100% ; border: 1px solid red; height: 2px;">
                    <div class="container">                        
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <div class="form-group md-form mt-3" style="text-align: center">                    
                                    <label form="intendente" ><b><h3>LISTA</h3></b> </label>
                                </div>                    
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <div class="form-group mt-3" style="text-align: center">
                                    <label form="intendente" ><b><h3>VOTOS</h3></b> </label>
                                </div>                    
                            </div>
                        </div>

                        @php
                            $cont = 0;
                        @endphp

                        @foreach ($intendentes as $item)                        
                            <div class="row">                                
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                    <div class="form-group mt-3" style="text-align: center">                        
                                        <label form="intendente" ><b>  </b> </label>
                                        <input type="hidden" name="intendente[]" id="intendente" class="form-control" value={{$item->Id_Intendente}}>
                                        <br>
                                        <h5>
                                            {{$item->Nombre}} {{$item->Apellido}} - {{$item->lista->Alias}}
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                    <div class="form-group mt-3">
                                        <label form="votos" ></label>
                                        <input type="number" name="votos[]" id="votos[]" class="form-control voto_inte" value="0">
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach

                        <div class="row">

                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                <div class="form-group mt-3" style="text-align: center">                                                                    
                                    <br>
                                    <label form="intendente" ><b>TOTAL DE VOTOS</b> </label>
                                </div>                    
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                <div class="form-group" style="text-align: center">
                                    <label for="total_votos"></label>
                                    <input type="number"  readonly id="total_votos" name="total_votos" class="form-control " value="0">
                                    @error('total_votos') <span class="text-danger">{{$message}}</span> @enderror                    
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                <div class="form-group" style="text-align: center">
                                    <br>
                                    <label form="acta" ><b>ACTA</b> </label>
                                </div>                    
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                                <div class="form-group" style="text-align: center">
                                    <label for="file"></label>
                                    <input type="file" name="acta" id="acta" accept="image/*" class="form-control" placeholder="Acta.." >
                                </div>
                            </div>
                        </div>

                        <div class="form-row text-center">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" style="align-items: center" id="btnGuardar">Guardar</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        
            </div>

        </div>

    </form>

@endsection

@section('scripts')
    <script src="{{ asset('js/votacion.js') }}"></script>
@endsection