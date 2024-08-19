<div >
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">            
            <div class="form-group">
                <div class="input-group">
                    <label for="">Candidato</label>
                    <select wire:model="tipo" class="form-control">
                        <option value="1">Intendente</option>
                        <option value="2">Consejal</option>
                    </select>
                </div>    
            </div>            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table id="detalles" class="table table-striped table-condensed table-bordered table-hover table-responsive">                                        
                    <thead>
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
