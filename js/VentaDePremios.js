function actualizarCosto(id_premio) {
    var costo_premio = document.getElementById("costo_" + id_premio).value;
    document.getElementById("costo_seleccionado").value = costo_premio;
}

function limpiarFormulario() {
    document.getElementById('main-contact-form').reset();
}