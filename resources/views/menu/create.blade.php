@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="mu-title">
                <span class="mu-subtitle">Agregar Nuevo</span>
                <h2>Platillo</h2>
            </div>

            <form action="/tableplatos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Nombre del Platillo</label>
                        <input type="name" name="nombre_platillo" class="form-control" placeholder="First name">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Categoría</label>
                        <select name="categoria" class="custom-select form-control">
                            <option value=" "> Seleccione la Categoria</option>
                            @foreach ($categorias as $categoria)                          
                            <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>    
                            @endforeach                                  
                        </select>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Precio de Venta</label>
                        <input type="text" name="precio_venta" class="form-control" placeholder="0.00">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Descripción del platillo</label>
                        <textarea class="form-control" name="descripcion_platillo" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Referencia</label>
                        <input name="referencia" class="form-control-file" id="imagen" type="file">
                        <img id="imagenSeleccionada" style="max-height: 300px;">
                    </div>
                </div>
     
                <div class="form-row">
                    <div class="mb-12 text-right">
                        <a href="/tableplatos" class="btn btn-danger" tabindex="5"><i class="bi bi-x-lg"></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-plus-lg"></i> Agregar</button>
                    </div>
                </div>

            </form>
            
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script> 

    </section>

@endsection
