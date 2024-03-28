//Variables y selectores
const btnViewReport = document.querySelector("#btnViewReport");
const idRestaurante = document.querySelector("#idrestaurante");
const idProducto = document.querySelector("#idproducto");
const frameReport=document.querySelector("#frameReport");
const fechaInicio=document.querySelector("#fechaInicio");
const fechaFinal=document.querySelector("#fechaFinal");
const API=new Api()

//eventos
eventListener();

function eventListener() {
    document.addEventListener("DOMContentLoaded",cargarDatos);
    btnViewReport.addEventListener("click",viewReport);
    
}


function cargarDatos() {
    API.get("restaurantes/getAll").then(
        data=>{
            if (data.success) {
                idRestaurante.innerHTML="";

                const optionRestaurante=document.createElement("option");
                optionRestaurante.value=0;
                optionRestaurante.textContent="Todos";
                idRestaurante.append(optionRestaurante);
                data.records.forEach(
                    (item,index)=>{
                        const {idrestaurante,nombre_restaurante}=item;
                        const optionRestaurante=document.createElement("option");
                        optionRestaurante.value=idrestaurante;
                        optionRestaurante.textContent=nombre_restaurante;
                        idRestaurante.append(optionRestaurante);
                    }
                );
                cargarProductos();
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function cargarProductos() {
    API.get("productos/getAll").then(
        data=>{
            if (data.success) {
                idProducto.innerHTML="";

                const optionProducto=document.createElement("option");
                optionProducto.value=0;
                optionProducto.textContent="Todos";
                idProducto.append(optionProducto);
                data.records.forEach(
                    (item,index)=>{
                        const {idproducto,nombre}=item;
                        const optionProducto=document.createElement("option");
                        optionProducto.value=idproducto;
                        optionProducto.textContent=nombre;
                        idProducto.append(optionProducto);
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

function viewReport() {
    frameReport.src=`${BASE_API}reportes/getReport?idrestaurante=${idRestaurante.value}&idproducto=${idProducto.value}&fechaInicio=${fechaInicio.value}&fechaFinal=${fechaFinal.value}`;
}

