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
                CONSULTA DE REFERENTES
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <form action="{{route('consulta.referente')}}" method="GET">                            
                <div class="form-group">
                    <div class="input-group">                        
                        <select name="referente" id="referente" class="form-control selectpicker"  data-live-search="true">                            
                            @foreach ($referentes as $item)                                
                                <option value="{{$item->id}}" {{ ($item->id == $referente ? 'selected' : '') }}>
                                    {{$item->documento}} - {{$item->apellido_nombre}}
                                </option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Buscar </button>                                                        
                        </span>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="row">
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="table-responsive">

                <table id="example" class="table table-striped table-condensed table-bordered table-hover table-responsive">

                    <thead style="background-color:#f71808a8">
                        <th style="text-align: center">Cedula</th>
                        <th style="text-align: center">Apellido y Nombre</th>
                        <th style="text-align: center">Local</th>
                        <th style="text-align: center">Mesa</th>
                        <th style="text-align: center">Orden</th>
                        <th style="text-align: center">Voto</th>
                    </thead>

                    @if ($data)

                        <tbody>

                            @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: right; font-size: 1.2rem">{{number_format($item->cedula, 0, ".", ".")}}</td>
                                    <td style="text-align: left; font-size: 1.2rem">{{$item->apellido_nombre}}</td>
                                    <td style="text-align: left; font-size: 1.2rem">{{$item->local_ob->Desc_Local}}</td>
                                    <td style="text-align: right; font-size: 1.2rem">{{$item->mesa}}</td>
                                    <td style="text-align: right; font-size: 1.2rem">{{$item->orden}}</td>                                    
                                    <td style="text-align: center; font-size: 1.2rem" width="70px">
                                        {{ $item->voto == 1? 'SI': 'NO'}}
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                        
                    @endif
                    <tfoot>
                        <tr>
                            <th colspan="4">Cantidad Total de Personas Comprometida</th>
                            <th colspan="2" class="text-right text-lg">{{number_format($total, 0, ".", ".")}}</th>
                        </tr>
                    </tfoot>

                </table>
                
            </div>

            {{$data->appends(['referente' => $referente])->links()}}

        </div>

    </div>

@endsection

@section('scripts')
    
@endsection
