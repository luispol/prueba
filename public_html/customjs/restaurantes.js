//Variables globales y selectores
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formRestaurantes=document.querySelector("#formRestaurantes");
const formIngredientes=document.querySelector("#formIngredientes")
const tableContent=document.querySelector("#contentTable table tbody");
const divFoto=document.querySelector("#divFoto");
const inputFoto=document.querySelector("#foto");
const API = new Api();
let dataTable;
let map;
let markers = [];

//Configuracion de eventos
eventListeners();



function eventListeners() {
    btnNew.addEventListener("click",agregarRestaurante);
    btnCancelar.addEventListener("click",cancelarRestaurante);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    divFoto.addEventListener("click",agregarFoto);
    inputFoto.addEventListener("change",actualizarFoto);
    formRestaurantes.addEventListener("submit",guardarRestaurante);
    formIngredientes.addEventListener("submit", guardarIngredientes);
    //document.addEventListener("DOMContentLoaded",initMap);
}

//Funciones

function limpiarForm(op) {
    formRestaurantes.reset();
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
                initMap(data.records);
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
                cargarDatos();
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

//Funcion para poder generar el mapa resumen de la API de Google Maps
async function initMap(restaurantes) {
    //Lozalizacion predeterminada
    const position = { lat: 13.983161777771164, lng: -89.54772914095115 };
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    //const { AdvancedMarkerView } = await google.maps.importLibrary("marker");
    
    map = new Map(document.getElementById("map"), {
      center: position,
      zoom: 10
    });

    restaurantes.forEach((item) =>{
        const position = { lat: parseFloat(item.latitud), lng: parseFloat(item.longitud)};
        const marker = new google.maps.Marker({
            position: position,
            map: map,
            title: item.nombre_restaurante
        });
        markers.push(marker);
    });

}


function editarRestaurante(id) {
    hideMarkers();
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    limpiarForm(1);
    API.get("restaurantes/getOneRestaurante?id="+id).then(
        data=>{
            //console.log(data);
            if (data.success) {
                mostrarDatosForm(data.records[0]);
                //Mostrar solo el marcado para el restaurante a editar
                mostrarMarcadorUnico(data.records[0]);
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


function mostrarMarcadorUnico(record) {


    const position = { lat: parseFloat(record.latitud), lng: parseFloat(record.longitud) };

    // Crear y mostrar el marcador del restaurante seleccionado
    const marker = new google.maps.Marker({
        position: position,
        map: map,
        draggable:true,
        title: record.nombre_restaurante
    });

    map.setCenter(position);

    // Listener para el evento de arrastrar el marcador
    google.maps.event.addListener(marker, 'dragend', function(event) {
    // Obtener las nuevas coordenadas del marcador
    const newLat = event.latLng.lat();
    const newLng = event.latLng.lng();

    // Actualizar los valores de los cuadros de texto
    document.getElementById("latitud").value = newLat;
    document.getElementById("longitud").value = newLng;
    });
}



  
// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
    setMapOnAll(null);
  }
  
  
  

  


function mostrarDatosForm(record) {
    const {idrestaurante,nombre_restaurante,direccion,telefono,contacto,foto,fecha_ingreso,latitud,longitud}=record;
    document.querySelector("#idrestaurante").value=idrestaurante;
    document.querySelector("#nombre").value=nombre_restaurante;
    document.querySelector("#telefono").value=telefono;
    document.querySelector("#contacto").value=contacto;
    document.querySelector("#fechaIngreso").value=fecha_ingreso;
    document.querySelector("#latitud").value=latitud;
    document.querySelector("#longitud").value=longitud;
    divFoto.innerHTML=`<img src="${foto}" class="h-100 w-100 style="object-fit:contain;">`;
}

function eliminarRestaurante(id) {
    Swal.fire({
        title:"¿Estás seguro de eliminar el registro?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            //console.log(resultado);
            if (resultado.isConfirmed) {
                API.get("restaurantes/deleteRestaurante?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarRestaurante();
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
        }
    );
 }

  
  
 