<div class="modal" id="categoriaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Agregar nueva Categoria</h1>
            </div>
            <div class="modal-body">
                    <form action="/tableplatos/addcategoria" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-8">
                        <label for="name" class="text-left">Nombre de la Categoría</label>
                        <input type="name" name="nombre_categoria" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name" class="text-white">Opciones</label>
                        <button type="submit" class="btn btn-primary">Guardar Categoria</button>
                        </div>
                    </div>
                    </form>
                    <div class="row">

                    </div>
                    <div class="form-row">
                        <table class="table table-success table-striped table-bordered text-center tabla-categoria hidden">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->nombre_categoria }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-success">Editar</button>
                                            <button type="button" class="btn btn-danger ">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
            </div>
            <div class="modal-footer text-left">
                <button type="button" onclick="mostrarListadoCategorias()" class="btn btn-primary">Ver listado de Categoria</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        
        
        </div>
    </div>
</div>
