@extends('layouts.admin')

@section('contenido')
    <div class="rows">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session()->has('msj'))
            
            <div class="alert alert-danger" role="alert">{{session('msj')}}</div>
            
            @else
                
            @endif

            @error('mesa_id')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror    
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="alert alert-danger" style="text-align: center" role="alert">
                CONSEJAL
            </div>
        </div>
    </div>
    <form action="{{route('consejal.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @livewire('votacion.consejal-voto')

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                <div class="table-responsive">

                    <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">

                        <thead style="background-color:#f71808a8">

                            <th style="text-align: center; font-size: 1.2rem"><i class="fa fa-arrow-down" aria-hidden="true"></i>Orden / <i class="fa fa-arrow-right" aria-hidden="true"></i>Lista</th>
                            @foreach ($listas as $lista)
                            
                                <th style="text-align: center; font-size: 1.2rem">{{$lista->numero_lista}}</th>
                                <input type="hidden" name="lista[]" value="{{$lista->Id_Lista}}">

                            @endforeach
                            
                        </thead>
                        
                        <tbody>                        
                            @foreach ($ordenes as $orden)

                                <tr style="align-items: center">

                                    <td style="text-align: right">{{$orden->Orden}} <input type="hidden" name="orden[]" value="{{$orden->Orden}}"></td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_10 voto_general" name="votos[]" id="votos_10[]" value="0" onkeyup="suma(this)"> </td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_11 voto_general" name="votos[]" id="votos_11[]" value="0" onkeyup="suma(this)"> </td>                            
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_12 voto_general" name="votos[]" id="votos_12[]" value="0" onkeyup="suma(this)"> </td>                                
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_13 voto_general" name="votos[]" id="votos_13[]" value="0" onkeyup="suma(this)"> </td>                                
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_14 voto_general" name="votos[]" id="votos_14[]" value="0" onkeyup="suma(this)"> </td>                                
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_15 voto_general" name="votos[]" id="votos_15[]" value="0" onkeyup="suma(this)"> </td>                                
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_16 voto_general" name="votos[]" id="votos_16[]" value="0" onkeyup="suma(this)"> </td>                                
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_17 voto_general" name="votos[]" id="votos_17[]" value="0" onkeyup="suma(this)"> </td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_18 voto_general" name="votos[]" id="votos_19[]" value="0" onkeyup="suma(this)"> </td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_19 voto_general" name="votos[]" id="votos_19[]" value="0" onkeyup="suma(this)"> </td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_20 voto_general" name="votos[]" id="votos_20[]" value="0" onkeyup="suma(this)"> </td>
                                    <td style="text-align: right"> <input type="number" style="text-align: right" class="form-control voto_21 voto_general" name="votos[]" id="votos_21[]" value="0" onkeyup="suma(this)"> </td>                                
                                </tr>                            
                            @endforeach

                        </tbody>

                        <tfoot>                        
                            <tr>
                                <td style="text-align: right">TOTAL:</td>
                                <td style="text-align: right"> <input type="number" id="total_10" name="total_10" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_11" name="total_11" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_12" name="total_12" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_13" name="total_13" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_14" name="total_14" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_15" name="total_15" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_16" name="total_16" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_17" name="total_17" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_18" name="total_18" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_19" name="total_19" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_20" name="total_20" style="text-align: right" class="form-control" value="0" readonly> </td>
                                <td style="text-align: right"> <input type="number" id="total_21" name="total_21" style="text-align: right" class="form-control" value="0" readonly> </td>
                            </tr>
                        </tfoot>                    
                    </table>

                </div>

            </div>

        </div>

        <div class="row">                        
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">                                    
                <div class="form-group md-form mt-3" style="text-align: right">
                    <label for="consejal" data-error="wrong">VOTOS NULOS:</label>                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">            
                <div class="form-group md-form mt-3">                 
                    <input id="votos" name="voto_nulos_dato" type="number" required value="0" class="form-control voto_general">
                </div>                        
            </div>
        </div>

        <div class="row">                        
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">                                    
                <div class="form-group md-form mt-3" style="text-align: right">
                    <label for="consejal" data-error="wrong">VOTOS EN BLANCO:</label>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">            
                <div class="form-group md-form mt-3">                 
                    <input id="votos" name="voto_blanco_dato" type="number" required value="0" class="form-control voto_general">
                </div>                        
            </div>
        </div>

        <div class="row">                        
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">                                    
                <div class="form-group md-form mt-3" style="text-align: right">
                    <label for="consejal" data-error="wrong">VOTOS A COMPUTAR:</label>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">            
                <div class="form-group md-form mt-3">
                    <input id="votos" name="voto_computar_dato" type="number" required value="0" class="form-control voto_general" >
                </div>                        
            </div>
        </div>

        <div class="row">                    
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                <div class="form-group md-form mt-3" style="text-align: right">
                    <label for="consejal" data-error="wrong">TOTAL DE VOTOS:</label>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                <div class="form-group md-form mt-3">   
                    <input id="total_votos" name="total_votos" type="number" required value="0" class="form-control" readonly>
                    @error('total_votos')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                <div class="form-group md-form mt-3" style="text-align: right">
                    <label form="acta" ><b>ACTA:</b> </label>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                <div class="form-group md-form mt-3">                
                    <input type="file" name="acta" id="acta" accept="image/*" class="form-control" placeholder="Acta.." >
                    @error('acta')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="form-row text-center">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <button class="btn btn-success btn-default btn-rounded float-right" type="submit">Procesar</button>
            </div>    
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/votacion.js') }}"></script>
@endsection
