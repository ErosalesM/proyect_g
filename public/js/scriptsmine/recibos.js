function DetalleRecibo(url){
    $.get(url,function(response){
        $('.idDetalleFactura').html(response['id']);
        var platillo= JSON.parse(response['orden']);
        var porcentaje = 10;
        var servicio = 0;
        var subtotal= 0; 
        var total; 

        $(".listaDetalles").html('');
        platillo.forEach(function(orden){
            subtotal += (Number(orden.cantidad) * Number(orden.precio_unitario));
            servicio = (subtotal/100 * porcentaje);
            total = (subtotal + servicio);
            $(".listaDetalles").append(`
        <tr>
                 
        <td>${orden.cantidad} </td>
        <td>${orden.platillo}</td>
        <td>Q. ${orden.precio_unitario}</td>
        <td>Q. ${orden.total} </td>
        </tr>
        
        `);
        $(".servicio").html(`Q.   ${servicio}`);
        $(".totalRecibo").html(`Q.   ${total}`);
        })
        
        
    })
}

function addMetodopago(){
    $('.metodo-pago').removeClass('hidden');
    $('.addplato').addClass('hidden');
    // caro = $('.cambiotpago').value(' ').trigger('change');
}

function deleteMetodopago()
{
    $('.metodo-pago').addClass('hidden');
    $('.addplato').removeClass('hidden');
}

function nuevacategoy()
{
    // $('.nueva-cat').addClass('hidden');
}

function mostrarListadoCategorias()
{
    $('.tabla-categoria').removeClass('hidden'); 
}