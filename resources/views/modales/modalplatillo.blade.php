<div class="modal fade" id="ordenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center ModalnombrePlatillo" id="exampleModalLongTitle">

                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mu-about-us-left">
                            <img class="imagen" src="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mu-about-us-right">
                            <p class="descripcion">
                            </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Cantidad:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cantidad" class="form-control cantidadPlatillo">
                                    <input type="hidden" class="idPlatilloModal">
                                    <input type="hidden" class="precio">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>¿Desea Realizar un cambio?
                                    Anótelo aquí: </label>
                                <textarea class="form-control cambiosPlatillo" placeholder="Realizar cambios">
                                    </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group col-md-6">
                <button onclick="AgregaralPedido('{{ url('/menu/platillo') }}')" class="btn btn-success btn-block button  addplato"><i class="bi bi-cart-plus-fill"></i>Agregar a la orden</button>
                </div>
                <div class="form-group col-md-6">
                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="bi bi-box-arrow-left"></i>   Cerrar</button>       
                </div>      
            </div>
        </div>
    </div>
</div>



