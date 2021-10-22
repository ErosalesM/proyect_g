<div class="modal fade" id="mipedidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="mu-title">
                    <span class="mu-subtitle">Pedidos</span>
                    <h2>a Realizar</h2>
                </div>
                {{-- <button onclick="mostrarPedidosRealizados('{{url('/menu/mostrar')}}')" class="btn btn-primary btn-block pedidosRealizados">Pedidos Realizados</button>
                <button onclick="retornarpedidos()" class="btn btn-success btn-block new-pedido hidden">Realizar nuevo Pedido</button> --}}
            </div>
            <div class="modal-body">
                
                <table id="tablaplatillos" class="table table-success table-striped table-bordered text-center tablaPrimer-pedido">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col"> </th>
                            <th class="text-center" scope="col">Platillo</th>
                            <th class="text-center" scope="col">Precio</th>
                            <th class="text-center" scope="col">Cantidad</th>
                            <th class="text-center" scope="col">Cambios</th>
                            <th class="text-center" scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="misPedidos">

                    </tbody>
                    <tr>
                        <th colspan="5" class="text-right">Cobramos un 10% por el servicio:</th>
                        <th>
                            <p class="text-center">10%</p>
                        </th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">TOTAL :</th>
                        <th>
                            <p id="total" class="totalPedido"></p>
                        </th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                </table>

                <form class="formularioPedido" method="POST">
                    @csrf
                    <input type="hidden" class="post-mesa" name="post-mesa">
                    <input type="hidden" class="post-platillos" name="post-platillos">
                    <input type="hidden" class="post-datosCliente" name="post-datosCliente">
                </form>
                {{-- @csrf --}}
                <div class="form-row hidden datos-Nuevocliente">
                    <h4>Agregue sus datos para el pedido:</h4>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">Nombres</label>
                        <input type="text" name="nombres" class="form-control nombre-cliente" placeholder="First name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control apellido-cliente"
                            placeholder="Last name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">NIT</label>
                        <input type="phone" name="nit" class="form-control nit-cliente">
                    </div>
                    </div>
                    
                </div>
                <div class="form-row select-mesa">
                    <div class="form-group ">
                        <label>MESA</label>
                        <select name="categoria" class="custom-select form-control mesa-pedido">
                            <option value=" "> Seleccione la Mesa</option>
                            <option value="1">B1</option>
                            <option value="2">B2</option>
                            <option value="3">B3</option>
                            <option value="4">B4</option>
                            <option value="5">B5</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" class="imagen-pedido" name="referencia" value="">
                <input type="hidden" class="platillo-pedido" name="platillo" value="">
                <input type="hidden" class="precio-pedido" name="precio" value="">
                <input type="hidden" class="cantidad-pedido" name="cantidad" value="">
                <input type="hidden" class="cambios-pedido" name="cambios" value="">
                <input type="hidden" class="subtotal-pedido" name="subtotal" value="">
                <input type="hidden" class="total-pedido" name="total" value="">

            </div>
            <div class="modal-footer">
                <div class="form-row btn-sinDatos">
                <div class="form-group col-md-6">
                <button onclick="finalizarPedido('{{ url('/menu/ingresar/pedido') }}')"
                    class="btn btn-success btn-block">Enviar Pedido</button>
                </div>
                <div class="form-group col-md-6">
                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
                <div class="form-row hidden datos-Nuevocliente">
                    <div class="form-group col-md-6">
                        <button type="button" onclick="registrarDatosPedido('{{ url('/menu/ingresar/pedido') }}',true)" class="btn btn-success btn-block ">
                            Enviar mi Pedido
                        </button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="button" onclick="cancelarregistroCliente()" class="btn btn-danger btn-block elmiinar-nuevoRegistro">
                        Cancelar el Registro de Datos
                        </button>
                    </div>                  
                    </div>
            </div>
        </div>
    </div>
</div>
