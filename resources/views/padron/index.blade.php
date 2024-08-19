@extends('layouts.admin')

@section('contenido')

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session()->has('msj'))        
                <div class="alert alert-danger" role="alert">{{session('msj')}}</div>                
            @endif        
        </div>

    </div>
    
    <form action="{{route('padron.index')}}" method="GET">
        <div class="form-group">
            <div class="input-group">
                <input type="search" class="form-control" name="searchtext"  placeholder="Buscar.." value="{{$searchtext}}">        
                <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
            </div>
        </div>
    </form>

    <div class="row" id="pantalla_grande">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">
                    @if ($data)                    
                        <thead>
                            <tr style="text-align: center">
                                <th style="vertical-align:middle; text-align:center"><img src="{{Storage::url(Auth::user()->url)}}"></th>
                            </tr>
                        </thead>
                    @endif

                    @if ($data)
                        <tbody>
                            <tr>
                                <td style="text-align: center">CEDULA DE IDENTIDAD</td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><b>{{number_format($data->cedula, 0, ".", ".")}}</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">APELLIDO Y NOMBRE</td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><b>{{$data->apellido_nombre}}</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">LOCAL</td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><b>{{$data->local_ob->Desc_Local}}</b></td>
                            </tr>                           
                            <tr>
                                <td style="text-align: center"> MESA : <b>{{$data->mesa}} </b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">ORDEN : <b>{{$data->orden}} </b></td>
                            </tr>
                            <tr>
                                <td style="text-align: center" width="30px">
                                    <a href="{{route('padron.pdf', $data)}}" target="_blank">
                                        <button class="btn btn-info btn-sm"><li  class="fa fa-file-pdf-o"></li> PDF</button>
                                    </a>
                                </td>
                            </tr>
                            <tr style="text-align: center">
                                <td><button id="btn_ver" class="btn btn-primary btn-sm">Ver Mas</button></td>
                            </tr>
                                                        
                            <form action="{{route('padron.store')}}" method="post">
                                @csrf
                                <tr>
                                    <td style="display: none" class="ver centro">
                                        Veces consultado = {{$data->consulta_padron->count()}}
                                        <br>
                                        Fecha y Hora Ult: {{date('d/m/Y H:i', strtotime($data->consulta_padron[0]->created_at))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display: none" class="ver centro">
                                        Referente: 
                                        <select name="referente" id="referente" class="selectpicker" data-live-search="true">
                                            @foreach ($referentes as $item)
                                                <option value="{{$item->id}}" {{ ($data->referente_id == $item->id ? 'selected' : '') }}>
                                                    {{$item->apellido_nombre}}                                                    
                                                </option>    
                                            @endforeach                                            
                                        </select>
                                    </td>                                        
                                </tr>
                                <tr>
                                    <td style="display: none" class="ver centro">
                                        Voto :  <input type="checkbox" class="form-check-input" id="voto" name="voto" {{ ($data->voto == 1 ? 'checked' : '') }}> 
                                        <input type="hidden" class="form-check-input" id="cod_padron" name="cod_padron" value="{{$data->CodPadron}}">  
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display: none" class="ver centro">
                                        <button type="button" data-toggle="modal" data-target="#exampleModal">Crear Referente</button>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td style="display: none" class="ver centro"><button style="font-size: 1.2rem" class="btn btn-success btn-sm float-right" type="submit">OK</button> </td>
                                </tr>
                            </form>
                        </tbody>

                    @else

                        <tfoot>
                            <tr style="background-color:#ede7e6a8">
                                <td colspan="8" style="text-align: center"><h3><b> "No figura en el Padron" </b></h3></td>
                            </tr>
                        </tfoot>
                    @endif

                </table>

            </div>        
        </div>
    </div>

    @include('ui.referente')

@endsection

@section('scripts')
    <script src="{{ asset('js/padron.js') }}"></script>
@endsection