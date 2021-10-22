function cancelarEdicion(event){
    event.preventDefault()
    event.stopPropagation()  
    Swal.fire({
        title: '¿Desea cancelar los cambios?',        
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: 'red',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
            Swal.fire('¡Cancelar!', 'Cambios Cancelados.','success');
        }
    })            
}