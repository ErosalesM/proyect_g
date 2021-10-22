<div class="modal fade" id="detalleReciboModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLongTitle">
                    Detalles de Recibo: <label class="idDetalleFactura"></label>
                </h3>
            </div>
            <div class="modal-body">
                <input type="hidden" class="idDetalleRecibo" name="idDetalleRecibo">
                <table id="tabladetalles" class="table table-success table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Cant.</th>
                            <th class="text-center" scope="col">Descripción</th>
                            <th class="text-center" scope="col">Precio Unitario</th>
                            <th class="text-center" scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="listaDetalles">

                    </tbody>
                    <tr>
                        <th colspan="3" class="text-right">Cobro del 10% por el servicio</th>
                        <th>
                            <p id="total" class="servicio text-center"></p>
                        </th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                    <tr>
                        <th colspan="3" class="text-right">TOTAL :</th>
                        <th>
                            <p id="total" class="totalRecibo text-center"></p>
                        </th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <div class="row">
                    {{-- <div class="form-group col-md-6">
                        <button class="btn btn-success btn-block button editpago">Agregar método de
                            Pago</button>
                    </div> --}}
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

{{-- <script type="text/javascript">

$(document).ready(function(){

    var table = $('#tablaplatillos').Datatable();

    table.on('click', 'editpago',function (){
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data= table.row($tr).data();
        console.log(data);

    })
})

</script> --}}
