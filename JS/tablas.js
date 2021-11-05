
/*
function mostrarDetallesServicios() {
    let tabla = document.getElementById('tabla_detalles_servicios');
    tabla.style.setProperty('display', 'block');
}
*/
var mostrar=false;

function ocultarDetallesServicios() {

    let tabla = document.getElementById('tabla_detalles_servicios');

    var dedo=document.getElementById("boton");
    var estilos=window.getComputedStyle(dedo);
    var estado=estilos.getPropertyValue("display");
    console.log(mostrar);

    if(mostrar){
        tabla.style.display="none";
        mostrar=false;
    }
    else{
        tabla.style.display="block";
        mostrar=true;
    }

    //let tabla = document.getElementById('tabla_detalles_servicios');
    //tabla.style.setProperty('display', 'none');
}