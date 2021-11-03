function detalles($valor) {
    let tabla = document.getElementById('tabla_detalles_servicios');
    let boton = document.getElementById('consulta_detalles');
    let ocultar = "Ocultar detalles";
    let mostrar = "Consultar detalles";
    console.log($valor);
    if ($valor === "oculto") {
        tabla.style.setProperty('display', 'block');
        boton.setAttribute('value', 'mostrado');
        let prueba = boton.textContent;
        boton.textContent = ocultar;
    }
    if ($valor === "mostrado") {
        tabla.style.setProperty('display', 'none');
        boton.setAttribute('value', 'oculto');
        boton.textContent = mostrar;

    }
}