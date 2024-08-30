// Fetch API desde un JSON (Array)

const cargarJSONBtn = document.querySelector('#cargarJSON');
cargarJSONBtn.addEventListener('click', obtenerDatos);


function obtenerDatos() {
    fetch('data/empleado.json') 
        .then( respuesta => {
            return respuesta.json()
        }) 
        .then(resultado => {
            mostrarHTML(resultado);
            console.log(resultado)
        })
        
}

function mostrarHTML({empresa,  id, nombre, trabajo}) {
    const contenido = document.querySelector('#contenido');

    contenido.innerHTML = `
        <h1 class="text-secondary">*******************************</h1>
        <p class="h3">Empleado: ${nombre} </p>
        <p class="h3">ID: ${id} </p>
        <p class="h3">Empresa: ${empresa} </p>
        <p class="h3">Trabajo: ${trabajo} </p>
        <h1 class="text-secondary">*******************************</h1>
    `
}