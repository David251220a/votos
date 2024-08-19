<div>
    <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">

                <label form="local_votacion_id" >Local Votacion</label>
                <select wire:model="local_votacion_id" name="local_votacion_id" id="local_votacion_id" class="form-control">
                    <option value="0">Seleccione un local</option>
                    @foreach ($local_votacion as $item)                        
                        <option value="{{$item->Id_Local}}">{{$item->Desc_Local}} </option>
                    @endforeach
                </select>

            </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label form="id_mesa_consejal" >Mesa</label>                
                <select wire:model.defer="mesa_id" name="mesa_id" id="mesa_id" class="form-control">
                    @foreach ($mesa as $item)
                        <option value="{{$item->Id_Mesa}}">Mesa {{$item->Id_Mesa}}</option>
                    @endforeach
                </select>                  
            </div>
        </div>

    </div>
</div>
