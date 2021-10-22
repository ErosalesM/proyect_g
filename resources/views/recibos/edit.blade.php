<div class="modal" id="addtipopago" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/recibos/{{ $recibo->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                  <label for="exampleFormControlInput1">Método de Pago</label>
                  <select name="tpago"  class="custom-select form-control">
                      <option value="">Seleccionar</option>
                      @foreach ($tipos as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>                                
                      @endforeach 
                  </select>
                </div>
                <div class="modal-footer">
                  <div class="form-row">
                    <div class="mb-12 text-right">
                      <a  class="btn btn-danger btncancelar" tabindex="5" type="submit" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" ></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-pencil-square"></i> Guardar Cambios</button>
                      </div>
                    </div>
                  </div>
            </form>  
        </div>
        
      </div>
    </div>
  </div>