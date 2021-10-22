@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="mu-title">
                <span class="mu-subtitle">Editar </span>
                <h2>Platillo</h2>
            </div>

            <form action="{{route('tableplatos.update', $platillo->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Nombre del Platillo</label>
                        <input type="name" name="nombre_platillo" value="{{$platillo->nombre_platillo}}" class="form-control" placeholder="First name">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Categoría</label>
                        <select name="categoria"  class="custom-select form-control">
                            <option value="{{$platillo->categoria}}">Seleccionar</option>
                            @foreach ($categorias as $categoria)                          
                            <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>    
                            @endforeach  
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Precio de Venta</label>
                        <input type="text" name="precio_venta" value="{{$platillo->precio_venta}}"  class="form-control" placeholder="0.00">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Descripción del platillo</label>
                        <textarea class="form-control" name="descripcion_platillo" placeholder="Descripción">{{$platillo->descripcion_platillo}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Referencia</label>
                        <input name="referencia" class="form-control-file" id="imagen" type="file">
                        <img id="imagenSeleccionada" src="/imagen/{{ $platillo->referencia }}" style="max-height: 200px;">
                    </div>
                </div>
     
                <div class="form-row">
                    <div class="mb-12 text-right">
                        <a href="/tableplatos" class="btn btn-danger" tabindex="5"><i class="bi bi-x-lg"></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-pencil-square"></i> Guardar Cambios</button>
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
