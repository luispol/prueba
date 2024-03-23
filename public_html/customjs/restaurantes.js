//Variables globales y selectores
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formSolicitantes=document.querySelector("#formRestaurantes")
const tableContent=document.querySelector("#contentTable table tbody")
const API = new Api();

//Configuracion de eventos
eventListeners();

function eventListeners() {
    btnNew.addEventListener("click",agregarRestaurante);
}

//Funciones
function agregarRestaurante() {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
}

function cancelarRestaurante() {
    panelDatos.classList.remove("d-none");
    panelForm.classList.add("d-none");
    location.reload();
    //cargarDatos();
}