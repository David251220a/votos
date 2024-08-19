<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">                
            <label form="id_local" >Local Votacion</label>
            <select wire:model="id_local" name="id_local" id="id_local" class="form-control ">                                    
                <option value="0">Seleccione un local</option>
                @foreach ($local_votacion as $vot)                                        
                    <option value="{{$vot->Id_Local}}">{{$vot->Desc_Local}} </option>
                @endforeach
            </select>                
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label form="id_mesa" >Mesa</label>
            <select wire:model.defer="id_mesa" name="id_mesa" id="id_mesa" class="form-control">
                @foreach ($mesa as $item)                                        
                    <option value="{{$item->Id_Mesa}}">Mesa {{$item->Id_Mesa}} </option>
                @endforeach
            </select>
            @error('id_mesa') <span class="text-danger">{{$message}}</span> @enderror   
        </div>                
    </div>
</div>