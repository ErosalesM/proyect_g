<div class="btn-group-vertical text-right" role="group" aria-label="Basic example">
    @foreach ($categorias as $categoria)  
    <a type="button" href="{{url('view-category/'.$categoria->nombre_categoria)}}" class="btn btn-warning">{{$categoria->nombre_categoria}} </a>
    @endforeach
</div>