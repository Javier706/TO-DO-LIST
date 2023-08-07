
function validar() {

  

    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;

    if (titulo === "" || descripcion === "") {
        swal({
            title: "Error",
            text: "Todos los campos son obligatorios!",
            icon: "error",
            button: "Cerrar",
        });
        return false;
    } 
     history.replaceState(null,null,location.pathname)
    
}