//Variables globales y selectores
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formSolicitantes=document.querySelector("#formRestaurantes")
const tableContent=document.querySelector("#contentTable table tbody")
const divFoto=document.querySelector("#divFoto");
const inputFoto=document.querySelector("#foto");
const API = new Api();
let dataTable;
let map;

//Configuracion de eventos
eventListeners();



function eventListeners() {
    btnNew.addEventListener("click",agregarRestaurante);
    btnCancelar.addEventListener("click",cancelarRestaurante);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    divFoto.addEventListener("click",agregarFoto);
    inputFoto.addEventListener("change",actualizarFoto);
    formSolicitantes.addEventListener("submit",guardarRestaurante);
    initMap();
}

//Funciones

function limpiarForm(op) {
    formSolicitantes.reset();
    document.querySelector("#idrestaurante").value="0";
}

function agregarRestaurante() {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
}

function cancelarRestaurante() {
    panelDatos.classList.remove("d-none");
    panelForm.classList.add("d-none");
    location.reload();
}

function cargarDatos() {
    API.get("restaurantes/getAll").then(
        data=>{
            if (data.success) {
                crearTabla(data.records);
            }else{
                console.error("Error al recuperar registros");
            }
        }
    ).catch(
        error=>{
            console.error("Error en la peticion http",error);
        }
    )
}

function crearTabla(records) {
    let html="";
    records.forEach(
       //El item tiene el registro mientras el index almacena la posicion
        (item,index)=>{
            
                html+=`
                    <tr>
                        <td>${index+1}</td>
                        <td>${item.nombre_restaurante}</td>
                        <td>${item.direccion}</td>
                        <td>${item.telefono}</td>
                        <td>${item.contacto}</td>
                        <td>${item.fecha_ingreso}</td>
                        <td style="width: 143.0469px;text-align: center;position: static;display: flex;">
                        <button class="btn btn-primary gamanet-btn-icon-primary" type="button" style="background: rgb(28,200,138);" onclick="editarRestaurante(${item.idrestaurante})"><img src="/prueba/public_html/assets/img/icons/icons8-edit-50.png?h=c44442844c7a03a126d8156e9370bed5"></button>
                        <div class="d-none d-sm-block topbar-divider" style="padding: 3px;"></div><button class="btn btn-primary gamanet-btn-icon-primary-dest" type="button" onclick="eliminarRestaurante(${item.idrestaurante})"><img src="/prueba/public_html/assets/img/icons/icon_trash-2.svg?h=0038eaaaaf12fe8bfcb4be1c39111dab" width="24" height="24"></button>
                        <div class="d-none d-sm-block topbar-divider" style="padding: 3px;"></div>
                        <div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Descripción de Documento</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center text-muted">Description </p>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    
                        </td>
                    </tr>
                `;
            
        }
    );

    tableContent.innerHTML=html;
    //console.log(records);
    if (typeof(dataTable)=="undefined") {
        dataTable = new DataTable('#contentTable table', {
            //paging: true,
            lengthMenu: [3, 5, 9],
            pageLength: [3], 
            scrollY: "30vh",
            scrollCollapse: true,
            language: {
                info: 'Mostrando pagina _PAGE_ of _PAGES_',
                infoEmpty: 'No hay registros',
                infoFiltered: '(filtrado desde _MAX_)',
                lengthMenu: 'Mostrando _MENU_ registros por pagina',
                zeroRecords: 'No hay registros encontrados',
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
            
        });
    }
}

function agregarFoto() {
    inputFoto.click();
}

function actualizarFoto(el) {
    if (el.target.files && el.target.files[0]) {
        const reader = new FileReader();
        reader.onload=(e)=>{
            divFoto.innerHTML=`<img src="${e.target.result}" class="h-100 w-100 style="object-fit:contain;">`;
        }
        reader.readAsDataURL(el.target.files[0]);
    }
}

function guardarRestaurante(event) {
    event.preventDefault();
    const formData=new FormData(formRestaurantes);
    API.post(formData,"restaurantes/save").then(
        data=>{
            //console.log(data);
            if (data.success) {
                // Recargar solo los datos de DataTable
                //dataTable.ajax.reload();
                //cancelarSolicitante();
                Swal.fire(
                    {
                        icon:"info",
                        text:data.msg,
                        confirmButtonText:"Aceptar"
                    }
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                        cancelarRestaurante();
                    }
                });
            }else{
                Swal.fire(
                    {
                        icon:"error",
                        title:"Error",
                        text:data.msg
                    }
                );
            }
        }
    ).catch(    
        error=>{
            console.log("Error:",error);
        }
    );
    
}

//Funcion para poder generar el mapa de la API de Google Maps
async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
  
    map = new Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 8,
    });
  }

 /* function editarSolicitante(id) {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    limpiarForm(1);
    API.get("restaurantea/getOneRestaurante?id="+id).then(
        data=>{
            //console.log(data);
            if (data.success) {
                mostrarDatosForm(data.records[0]);
            }else{
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.log("Error:",error);
        }
    );
}


function mostrarDatosForm(record) {
    const {id_solicitante,nombre_solicitante,telefono_solicitante1,telefono_solicitante2,departamento,municipio,email_solicitante1,email_solicitante2}=record;
    document.querySelector("#id_solicitante").value=id_solicitante;
    document.querySelector("#nombre").value=nombre_solicitante;
    document.querySelector("#telefono1").value=telefono_solicitante1;
    document.querySelector("#telefono2").value=telefono_solicitante2;
    document.querySelector("#departamento").value=departamento;
    document.querySelector("#municipio").value=municipio;
    document.querySelector("#correo1").value=email_solicitante1;
    document.querySelector("#correo2").value=email_solicitante2;
}*/


  
  
 