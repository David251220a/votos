<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{route('referente.post', $searchtext)}}" method="post">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title">Cargar Referente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">                                                    
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group mt-3">
                            <label form="documento" >Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control voto_inte" value="0">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group mt-3">
                            <label form="nombre" >Apellido y Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control voto_inte" value="">
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Grabar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
</div>