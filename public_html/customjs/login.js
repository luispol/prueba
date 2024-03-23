//Direccionamos los elementos HTML
const mensaje=document.querySelector("#mensaje");
const form=document.querySelector("#formlogin");

//Configuracion de eventos
form.addEventListener("submit",login);

async function login(event) {

    event.preventDefault();
    const API = new Api();
    const formData = new FormData(form);
    API.post(formData,"login/validar").then(
        data=>{
            if (data.success) {
                //alert(data.msg);
                window.location=data.url;
           }else{
                mensaje.classList.remove("d-none");
                mensaje.innerHTML=data.msg;
                setTimeout(
                    ()=>{
                        mensaje.classList.add("d-none");
                    }, 5000);
           }
            
        }

    ).catch(
        error=>{
            console.error("Error en la llamada:",error);
        }
    );
}