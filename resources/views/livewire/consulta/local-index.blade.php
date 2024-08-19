<div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="">Candidato</label>
            <select wire:model="tipo" class="form-control w-100">
                <option value="1">Intendente</option>
                <option value="2">Consejal</option>
            </select>            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="">Local de Votación</label>
            <select wire:model="local_id" class="form-control w-100">                
                @foreach ($local as $item)
                    <option value="{{$item->Id_Local}}">{{$item->Desc_Local}}</option>
                @endforeach
            </select>            
        </div>
    </div>

    <div class="row" style="margin-top: 40px">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">                                        
                    <thead>
                        <tr>
                            <td style="font-weight: bold; text-align: center;font-size: 15px"  colspan="3">Candidato {{$descripcion}} - Local: {{$descripcion_Local->Desc_Local}}</td>
                        </tr>
                        <tr style="text-align: center">
                            <th style="vertical-align:middle; text-align:center">Candidato {{$descripcion}}</th>
                            <th style="vertical-align:middle; text-align:center">Lista</th>
                            <th style="vertical-align:middle; text-align:center">Votos</th>
                        </tr>
                    </thead>                                        
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td style="text-align: center">
                                    @if ($tipo == 1)
                                        {{$item->inte->Nombre}} {{$item->inte->Apellido}}
                                    @else
                                        {{$item->conse->Nombre}} {{$item->conse->Apellido}}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($tipo == 1)
                                        {{$item->inte->lista->Desc_Lista}} - {{$item->inte->lista->Alias}}
                                    @else
                                        {{$item->conse->lista->Desc_Lista}} - {{$item->conse->lista->Alias}} 
                                    @endif
                                </td>
                                <td style="text-align: center">{{number_format($item->Votos, 0, ".", ".")}}</td>
                            </tr>
                        @endforeach                        
                    </tbody>
                    <tfoot>
                        <tr style="background-color:#ede7e6a8">
                            <td colspan="2"><h4><b> Total de Votos </b></h4></td>
                            <td style="text-align: right">
                                <h4>
                                {{number_format($total, 0, ".", ".")}}
                                </h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>        
        </div>
    </div>
</div>
