function OrdenarPlatillo(url){
     $('.cantidadPlatillo').val('');
     $('.cambiosPlatillo').val('');
    $.get(url,function(respuesta){
        $('.ModalnombrePlatillo').html(respuesta['nombre_platillo']);
        $('.imagen').prop('src',`/imagen/${respuesta['referencia']}`);
        $('.descripcion').html(respuesta['descripcion_platillo']);
        $('.idPlatilloModal').val(respuesta['id']);
        $('.precio').val(respuesta['precio_venta']);    
    })
}

function AgregaralPedido(url){
    var idPlatillo = $('.idPlatilloModal').val();
    var cantidad = $('.cantidadPlatillo').val();
    var cambios = $('.cambiosPlatillo').val();
    var precio = $('.precio').val();
    $.get(`${url}/${idPlatillo}`,function(respuesta){
        // var StorageOrden = null;
        var Fullorden = [];
        var platillo = {
            id:idPlatillo,
            precio: precio,
            cantidad:cantidad,
            cambios:cambios,
            nombre:respuesta['nombre_platillo'],
            imagen: respuesta['referencia']
        }
        var orden = localStorage.getItem('orden');
        if (orden) {
            Fullorden = JSON.parse(orden);
            Fullorden.push(platillo);
     
        }else{
            Fullorden.push(platillo);
    
        }
        let agregar = JSON.stringify(Fullorden);
        localStorage.setItem("orden",agregar);

        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Platillo agregado',
            showConfirmButton: false,
            timer: 5000
          })
          window.location = "/menu";

        

    })

}

function llamarModal(){
    var idpedido = localStorage.getItem('idpedido');
    if (idpedido) {
        $('#Editarmipedido').modal('show');
    } else
    {
        this.mostrarPedidos();
        $('#mipedidoModal').modal('show');
    }
    
}

function mostrarPedidos(){
    var orden = localStorage.getItem('orden');
    var platillo = JSON.parse(orden);
    var porcentaje = 10;
    var total = 0;
    var suma = 0;
    var sub_total = 0;

        $(".misPedidos").html('');
    platillo.forEach(function(orden) {
        
        suma += (Number(orden.cantidad) * Number(orden.precio));
        total= (suma/100 * porcentaje);
        sub_total = (suma + total);
        $(".misPedidos").append(`
        <tr>                   
        <td> <img src="/imagen/${orden.imagen} " width="60px"> </td>
        <td>${orden.nombre} </td>
        <td>Q. ${orden.precio}  </td>
        <td>${orden.cantidad}  </td>
        <td>${orden.cambios} </td>
        <td>Q. ${orden.precio * orden.cantidad} </td>
        </tr>
        
        `);
        $(".totalPedido").html(`Q${sub_total}`);
        
    });   
}

function registrarDatosPedido(url, nuevoCliente){
    var orden = localStorage.getItem('orden');
    var idemesa= $('.mesa-pedido').val();
     var datosCliente = null;
    if(nuevoCliente)
    {
        datosCliente = jsonNuevoCliente();
    } else
    {
        datosCliente = false;
    }
    $('.post-mesa').val(idemesa);
    $('.post-platillos').val(orden);
    $('.post-datosCliente').val(datosCliente);

    var formulario = $(".formularioPedido").serialize();
    $.post(url,formulario,function(respuesta){
        localStorage.setItem('idpedido', respuesta['success'])
        console.log(respuesta);
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Pedido Enviado',
            showConfirmButton: false,
            timer: 5000
          })
          window.location = "/menu";
          localStorage.removeItem('orden');
    })
}

$(document).ready(function(){
    var idpedido = localStorage.getItem('idpedido');
    if (idpedido) {
        $('.pedido-notificacion').html(1);
    }
})

function mostrarPedidosRealizados(url){
    var idpedido = localStorage.getItem('idpedido');
    var porcentaje = 10;
    var total = 0;
    var suma = 0;
    var sub_total = 0;
    if (idpedido) {
        $.get(`${url}/${idpedido}`,function(respuesta){
            var platillo= JSON.parse(respuesta['orden']);
            console.log(platillo);
            
            $(".platillosPedidos").html('');
            platillo.forEach(function(orden) {
                
                suma += (Number(orden.cantidad) * Number(orden.precio));
                total= (suma/100 * porcentaje);
                sub_total = (suma + total);
                $(".platillosPedidos").append(`
                <tr>                   
                <td> <img src="/imagen/${orden.imagen} " width="60px"></td>
                <td>${orden.platillo} </td>
                <td>Q.${orden.precio} </td>
                <td>${orden.cantidad}  </td>
                <td>${orden.cambios} </td>
                <td>Q. ${orden.precio * orden.cantidad}</td>
                </tr>
                
                `);
                $(".totalPedido").html(`Q${sub_total}`);
                
            });   
        })
    } else {
        console.log("Errores");
    }
    
    
    // $('.tablaPrimer-pedido').addClass('hidden');
    $('.select-mesa').addClass('hidden');
    $('.btn-sinDatos').addClass('hidden');
    $('.pedidosRealizados').addClass('hidden');
    $('.new-pedido').removeClass('hidden');

}

function retornarpedidos(){
    $('.tablaPrimer-pedido').removeClass('hidden');
    $('.select-mesa').removeClass('hidden');
    $('.btn-sinDatos').removeClass('hidden');
    $('.pedidosRealizados').removeClass('hidden');
    $('.new-pedido').addClass('hidden');
}


function finalizarPedido(url){
    
    var orden = JSON.parse(localStorage.getItem('orden'));
    if(!orden)
    {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No hay platillos en la orden!',
          })
    } else
    {
        
        Swal.fire({
            title: 'AVISO',
            text: '¿Desea registrar sus datos para la orden?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Registrar mis datos',
            denyButtonText: `Consumidor Final`,
            cancelButtonText: 'Cancelar',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $('.datos-Nuevocliente').removeClass('hidden');
                $('.btn-sinDatos').addClass('hidden');
            } else if (result.isDenied) {
                registrarDatosPedido(url,false);
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Pedido Enviado',
                    showConfirmButton: false,
                    timer: 5000
                  })
                  window.location = "/menu";
                  localStorage.removeItem('orden');
            }
          })
    }
      
}

function jsonNuevoCliente()
{
    var nombre = $('.nombre-cliente').val();
    var apellido =  $('.apellido-cliente').val();
    var nit =  $('.nit-cliente').val();
    
    var json = {
        nombre:nombre,
        apellido:apellido,
        nit : nit
    }
    return JSON.stringify(json);

}

function cancelarregistroCliente()
{
    $('.datos-Nuevocliente').addClass('hidden');
    $('.btn-sinDatos').removeClass('hidden');
}
