const formulario= document.getElementById("formulario");
const inputs=document.querySelectorAll("#formulario input")
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    DNI_NIE : /^(?:\d{8}[A-Z]|[XYZ]\d{7}[A-Z])$/
}

const validarFormulario=(e) => {
   switch(e.target.name){
     case "nombre":
        if(!expresiones.nombre.test(e.target.value)){
            document.getElementById("validado-name").innerHTML="incorrecto";
        }else{
            document.getElementById("validado-name").innerHTML="";
            

        }
        break;
     case "usuario":
        if(!expresiones.usuario.test(e.target.value)){
            document.getElementById("validado-user").innerHTML="incorrecto";
        }else{
            document.getElementById("validado-user").innerHTML="";
            

        }
        break;
     case "correo":
        if(!expresiones.correo.test(e.target.value)){
            document.getElementById("validado-correo").innerHTML="incorrecto";
        }else{
            document.getElementById("validado-correo").innerHTML="";
            

        }
        break;
     case "telefono":
        if(!expresiones.telefono.test(e.target.value)){
            document.getElementById("validado-phone").innerHTML="incorrecto";
        }else{
            document.getElementById("validado-phone").innerHTML="";
            

        }
        break;
     case "password":
        if(!expresiones.password.test(e.target.value)){
            document.getElementById("validado-password").innerHTML="incorrecto";
        }else{
            document.getElementById("validado-password").innerHTML="";
            
        }
        break;
     case "confirma_password":
        if(document.getElementById("confirma_password").value !== document.getElementById("password").value){
            document.getElementById("validado-repass").innerHTML="Las contraseñas no son las mismas";
        }else{
            document.getElementById("validado-repass").innerHTML="";
            

        }
        break;
     case "dni":
        if(!expresiones.DNI_NIE.test(e.target.value)){
            document.getElementById("validado-dni").innerHTML="DNI7NIE incorrecto";
        }else{
            document.getElementById("validado-dni").innerHTML="";
            
        }
        break;
   }
};

inputs.forEach((input) =>{
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
})

formulario.addEventListener('submit', (e)=>{ 
    e.preventDefault();
})

