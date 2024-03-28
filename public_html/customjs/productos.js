const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formProductos=document.querySelector("#formProductos")
const tableContent=document.querySelector("#contentTable table tbody")
const divFoto1=document.querySelector("#divFoto1");
const divFoto2=document.querySelector("#divFoto2");
const divFoto3=document.querySelector("#divFoto3");
const inputFoto1=document.querySelector("#foto1");
const inputFoto2=document.querySelector("#foto2");
const inputFoto3=document.querySelector("#foto3");
const btnGuardarModal = document.querySelector("#btnDetalleModal");
const btnIngrediente = document.querySelector("#btnIngrediente");
const formIngredientes = document.querySelector("#formIngredientes");
const bntTerminar = document.querySelector("#terminar");
const btnDetalleModal = document.querySelector("#btnDetalleModal");


const API = new Api();
let dataTable;


//Configuracion de eventos
eventListeners();

function eventListeners() {
    btnNew.addEventListener("click",agregarProducto);
    btnCancelar.addEventListener("click",cancelarProducto);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    divFoto1.addEventListener("click",agregarFoto1);
    inputFoto1.addEventListener("change",actualizarFoto1);
    divFoto2.addEventListener("click",agregarFoto2);
    inputFoto2.addEventListener("change",actualizarFoto2);
    divFoto3.addEventListener("click",agregarFoto3);
    inputFoto3.addEventListener("change",actualizarFoto3);
    formProductos.addEventListener("submit",guardarProducto);
    bntTerminar.addEventListener("click",recarga);
    btnDetalleModal.addEventListener("click", guardarIngrediente);
    //formDetalleCompra.addEventListener("submit", guardarDetalleCompra);
    //btnGuardarModal.addEventListener("click", hideDetalleCompraModal);
    
}


function recarga() {
    location.reload();
}
function limpiarForm(op) {
    formProductos.reset();
    document.querySelector("#idproducto").value="0";
    divFoto1.innerHTML="";
    divFoto2.innerHTML="";
    divFoto3.innerHTML="";
}



function agregarProducto() {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
}

function cancelarProducto() {
    panelDatos.classList.remove("d-none");
    panelForm.classList.add("d-none");
    location.reload();
}


function cargarDatos() {
    API.get("productos/getAll").then(
        data=>{
            if (data.success) {
                crearTabla(data.records);
                cargarRestaurantes();
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
                        <td>${item.nombre}</td>
                        <td>${item.precio}</td>
                        <td style="width: 143.0469px;text-align: center;position: static;display: flex;">
                        <button class="btn btn-primary gamanet-btn-icon-primary" type="button" style="background: rgb(28,200,138);" onclick="editarProducto(${item.idproducto})"><img src="/prueba/public_html/assets/img/icons/icons8-edit-50.png?h=c44442844c7a03a126d8156e9370bed5"></button>
                        <div class="d-none d-sm-block topbar-divider" style="padding: 3px;"></div><button class="btn btn-primary gamanet-btn-icon-primary-dest" type="button" onclick="eliminarProducto(${item.idproducto})"><img src="/prueba/public_html/assets/img/icons/icon_trash-2.svg?h=0038eaaaaf12fe8bfcb4be1c39111dab" width="24" height="24"></button>
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

function cargarRestaurantes() {
    API.get("restaurantes/getAll").then(
        data=>{
            if (data.success) {
                const txtRestaurante=document.querySelector("#idrestaurante");
                txtRestaurante.innerHTML="";
                data.records.forEach(
                    (item,index)=>{
                        const {idrestaurante,nombre_restaurante}=item;
                        const optionRestaurante=document.createElement("option");
                        optionRestaurante.value=idrestaurante;
                        optionRestaurante.textContent=nombre_restaurante;
                        txtRestaurante.append(optionRestaurante);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
 }

 function agregarFoto1() {
    inputFoto1.click();
 }

 //El parametro nos trae la informacion de lo que ralmente tiene el inputFile
 function actualizarFoto1(el) {
    //console.log(el);
    //Verificamos si la propiedad existe
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        //Al momento que nosotros indicamos que lea un archivo, el evento onload se dispara cuando exista el contenido del archivo
        reader.onload=(e)=>{
            //console.log(e.target.result);
            divFoto1.innerHTML=`<img src="${e.target.result}" class="h-100 w-100 style="object-fit:contain;">`;
        }
        //reader interpreta el contenido
        reader.readAsDataURL(el.target.files[0]);
    }
 }
 function agregarFoto2() {
    inputFoto2.click();
 }

 //El parametro nos trae la informacion de lo que ralmente tiene el inputFile
 function actualizarFoto2(el) {
    //console.log(el);
    //Verificamos si la propiedad existe
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        //Al momento que nosotros indicamos que lea un archivo, el evento onload se dispara cuando exista el contenido del archivo
        reader.onload=(e)=>{
            //console.log(e.target.result);
            divFoto2.innerHTML=`<img src="${e.target.result}" class="h-100 w-100 style="object-fit:contain;"">`;
        }
        //reader interpreta el contenido
        reader.readAsDataURL(el.target.files[0]);
    }
 }

 function agregarFoto3() {
    inputFoto3.click();
 }

 //El parametro nos trae la informacion de lo que ralmente tiene el inputFile
 function actualizarFoto3(el) {
    //console.log(el);
    //Verificamos si la propiedad existe
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        //Al momento que nosotros indicamos que lea un archivo, el evento onload se dispara cuando exista el contenido del archivo
        reader.onload=(e)=>{
            //console.log(e.target.result);
            divFoto3.innerHTML=`<img src="${e.target.result}" class="h-100 w-100 style="object-fit:contain;"">`;
        }
        //reader interpreta el contenido
        reader.readAsDataURL(el.target.files[0]);
    }
 }

 function guardarProducto(event) {
    event.preventDefault();
    const formData = new FormData(formProductos);
    API.post(formData, "productos/saveProducto")
      .then((data) => {
        if (data.success) {
            const idproducto = data.idproducto;
            console.log(idproducto);
          document.querySelector("#idproducto_ingrediente").value = idproducto
        }
      })
      .catch((error) => {
        console.log("Error:", error);
      });
  }


  function guardarIngrediente(event) {
    event.preventDefault();
    const formData = new FormData(formIngredientes);
    API.post(formData, "productos/saveIngredientes")
      .then((data) => {
        if (data.success) {
            formIngredientes.reset();
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: data.msg,
          });
        }
      })
      .catch((error) => {
        console.log("Error:", error);
      });
  }

  function editarProducto(id) {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    limpiarForm(1);
    API.get("productos/getOneProducto?id="+id).then(
        data=>{
            //console.log(data);
            if (data.success) {
                mostrarDatosForm(data.records[0]);
                console.log(data.records[0].idproducto);
                document.querySelector("#idproducto_ingrediente").value = data.records[0].idproducto;

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
    const {idproducto,idrestaurante,nombre,descripcion,foto1,foto2,foto3,precio}=record;
    //console.log(record);
    document.querySelector("#idproducto").value=idproducto;
    document.querySelector("#idrestaurante").value=idrestaurante;
    document.querySelector("#nombre").value=nombre;
    document.querySelector("#descripcion").value=descripcion;
    divFoto1.innerHTML=`<img src="${foto1}" class="h-100 w-100 style="object-fit:contain;">`;
    divFoto2.innerHTML=`<img src="${foto2}" class="h-100 w-100 style="object-fit:contain;">`;
    divFoto3.innerHTML=`<img src="${foto3}" class="h-100 w-100 style="object-fit:contain;">`;
    document.querySelector("#precio").value=precio;
}

function eliminarProducto(id) {
    Swal.fire({
        title:"¿Estás seguro de eliminar el registro?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            //console.log(resultado);
            if (resultado.isConfirmed) {
                API.get("productos/deleteProducto?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarProducto();
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
  


 

