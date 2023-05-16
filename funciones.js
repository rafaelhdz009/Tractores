function ftnDelPersona(id) {

    swal({
        title: "¡No tienes nada en el carrito!",
        text: "Debes de agregar un priducto al carrito",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Debes de agregar un producto...");
        }
      });
    
}


