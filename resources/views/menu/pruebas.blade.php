@extends('layouts.categorias')
<h1>Categoria:{{$categoria->nombre_categoria}}</h1>
 <br>

 <div class="tab-content">
   <div class="tab-pane fade in active " id="breakfast">
       <div class="mu-tab-content-area ">
           <div class="row ">
               @foreach ($platillos as $platillo)
                   <div class="col-md-6 ">
                       <div class="mu-tab-content-left">
                           <ul class="mu-menu-item-nav">
                               <li>
                                   <div class="media">
                                       <div class="media-left">
                                           <a href="#">
                                               <img src="/imagen/{{ $platillo->referencia }}"
                                                   width="40px">
                                           </a>
                                       </div>
                                       <div class="media-body">
                                           <h4 class="media-heading">
                                               <a role="button" onclick="OrdenarPlatillo('{{url('/menu/platillo').'/'.$platillo->id}}')" data-toggle="modal" data-target="#ordenModal">{{ $platillo->nombre_platillo }}</a>
                                           </h4>
                                           <span
                                               class="mu-menu-price">Q.{{ $platillo->precio_venta }}</span>
                                           <p>{{ $platillo->descripcion_platillo }}</p>
                                       </div>
                                   </div>
                               </li>
                           </ul>
                       </div>
                   </div>  
               @endforeach
           </div>
           <div class="d-flex justify-content-end">
           </div>
       </div>
   </div>
</div>