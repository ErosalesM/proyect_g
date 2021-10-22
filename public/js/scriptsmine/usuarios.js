function registrar_usuario(url){
    var form= $('.form-register').serialize();
    $.post(url,form,function(response){
        console.log(response['response']);
       
    }).fail(function(){
        Swal.fire(
            'Error al Guardar',
            'Revisar los datos',
            'warning'
          )
        
      })
}

function nuevocliente(){
    $('#modal-nuevocliente').modal('show');
}

// $.get(url,function(response){ 
//     console.log(response);
// })