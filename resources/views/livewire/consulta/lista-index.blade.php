<div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="">Lista</label>
            <select wire:model="lista_id" class="form-control w-100">
                <option value="0">--TODOS--</option>
                @foreach ($lista as $item)
                    <option value="{{$item->Id_Lista}}">{{$item->Desc_Lista}}</option>
                @endforeach
            </select>            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="">Local de Votación</label>            
            <select wire:model="local_id" class="form-control w-100">
                <option value="0">--TODOS--</option>
                @foreach ($local as $item)
                    <option value="{{$item->Id_Local}}">{{$item->Desc_Local}}</option>
                @endforeach
            </select>            
        </div>
    </div>

    @if ($tipo == 1)
        <div class="row" style="margin-top: 40px">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">                                        
                        <thead>
                            <tr>
                                <td style="font-weight: bold; text-align: center;font-size: 15px"  colspan="3">Local: {{$descripcion_Local}}</td>
                            </tr>
                            <tr style="text-align: center">                                
                                <th style="vertical-align:middle; text-align:center">Lista</th>
                                <th style="vertical-align:middle; text-align:center">Alias</th>
                                <th style="vertical-align:middle; text-align:center">Votos</th>
                            </tr>
                        </thead>                                        
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: center">
                                        {{$item->Desc_Lista}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$item->Alias}}
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
    @endif

    @if ($tipo == 2)
        <div class="row" style="margin-top: 40px">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">                                        
                        <thead>
                            <tr>
                                <td style="font-weight: bold; text-align: center;font-size: 15px"  colspan="2"> Lista: {{$desc_lis}}</td>
                            </tr>
                            <tr style="text-align: center">                                
                                <th style="vertical-align:middle; text-align:center">Local</th>
                                <th style="vertical-align:middle; text-align:center">Votos</th>
                            </tr>
                        </thead>                                        
                        <tbody>
                            @foreach ($data as $item)
                                <tr>                                    
                                    <td style="text-align: center">
                                        {{$item->local->Desc_Local}}
                                    </td>
                                    <td style="text-align: center">{{number_format($item->Votos, 0, ".", ".")}}</td>
                                </tr>
                            @endforeach                        
                        </tbody>
                        <tfoot>
                            <tr style="background-color:#ede7e6a8">
                                <td><h4><b> Total de Votos </b></h4></td>
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
    @endif
    
</div>
