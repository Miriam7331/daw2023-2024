// Fetch API desde un JSON (Objeto)

const cargarJSONArrayBtn = document.querySelector('#cargarJSONArray');
cargarJSONArrayBtn.addEventListener('click', obtenerDatos);


function obtenerDatos() {
    fetch('data/empleados.json') 
        .then( respuesta => {
            return respuesta.json()
        }) 
        .then(resultado => {
            mostrarHTML(resultado);
            console.log(resultado)
        })
        .catch(error =>{
            console.log(error);
        })
}

function mostrarHTML(empleados) {
    const contenido = document.querySelector('#contenido');

    let html = '';

    empleados.forEach( empleado => {
        // Trabajando los elementos en pantalla con Destructuring
        const { id, nombre, empresa, trabajo} = empleado;
        html += `
            <p class="h4">Empleado: ${nombre} </p>
            <p class="h4">ID: ${id} </p>
            <p class="h4">Empresa: ${empresa} </p>
            <p class="h4">Trabajo: ${trabajo} </p>
        `
        
    });
    contenido.innerHTML = html;
    
}