/***********
 * Archivo JS de Carrito de Compra + Local Storage
 */

//#region 1. LOCAL STORAGE
// Con el ejercicio comentado hasta el V2, en este modelo se incluye Local Storage y
// solo se comenta lo que tiene que ver con el.

// VARIABLES:
const carrito = document.querySelector("#carrito");
const conteCarrito = document.querySelector("#listaCarrito");
const listaCarrito = document.querySelector("table tbody");
const vaciarCarrito = document.querySelector("#vaciarCarrito");
const productos = document.querySelector("#productos");
const btnBoLinea = document.querySelector(".borrarProd");
const descargarCompra = document.querySelector("#descargarCompra");
const cargarCompra = document.querySelector("#cargarCompraEQUIPO");// Creado para cargar compra
let compra = []; // Arreglo vacío;

// EVENTOS
cargarEventList();
function cargarEventList() {
    productos.addEventListener('click', agregarProd);
    carrito.addEventListener('click', eliminarProdCarrito);
    vaciarCarrito.addEventListener('click', () => {
        compra = [];
        localStorage.clear(); // 
        carritoHTML();
    });

    // Creamos un addeventlistener para cargar el LOCALSTORAGE
        document.addEventListener('DOMContentLoaded',()=>{
            compra = JSON.parse(localStorage.getItem('compra'))|| [];
            carritoHTML();
        })

    //  Creamos el addEventListener del Botón para descargar la compra
    descargarCompra.addEventListener('click', compraJsonDown);

   // Creamos un addeventlistener para cargar la compra
   cargarCompra.addEventListener('click', leerArchivo);
    

}

// FUNCIONES 
function agregarProd(e) {
    if (e.target.classList.contains("btn")) {
        const prodSelec = e.target.parentElement.parentElement;
        leerDatosProd(prodSelec);
    } else {
        console.log("se pulsó en otro lado");
    }
}

function eliminarProdCarrito(e) {
    // console.log("Pulsando eliminarProdCarrito"); // Solo para comprobar
    // console.log(e.target.classList); 
    if (e.target.classList.contains("borrarProd")) {
        console.log("Estamos pulsando sobre borrar"); // Solo para demostrar
        const prodID = e.target.getAttribute("data-id")
        compra = compra.filter(prod => prod.id !== prodID);
        carritoHTML();      
    }
}

function leerDatosProd(prod) {
    const infoProd = {
        codigo: prod.querySelector("h5 span").textContent,
        nombre: prod.querySelector("h4").textContent,
        precio: parseFloat(prod.querySelector("h1").textContent),
        cantidad: 1,
        id: prod.querySelector("button").getAttribute("data-id"),
        
    }
    const seRepite = compra.some(prod => prod.id === infoProd.id)
    if (seRepite) {
        const actualCant = compra.map(prod => {
            if (prod.id === infoProd.id) {
                prod.cantidad++;
                return prod;
            } else {
                return prod;
            }
        })
    } else {
        compra.push(infoProd);
    }
    console.log(infoProd); // Solo para comprobar
    carritoHTML();
}

function carritoHTML() {
    limpiarHTML();
    compra.forEach(prod => {
        let row = document.createElement("tr");
        totLinea = prod.precio*prod.cantidad;
        
        row.innerHTML =
            ` <td class="h5"> ${prod.codigo} </td>
          <td class="h5"> ${prod.nombre} </td>
          <td class="h5"> ${prod.precio}€ </td>
          <td class="h5"> ${prod.cantidad} </td>
          <td class="h5"> ${totLinea}€ </td>
          <td class="h5"> 
            <a href="#" class="borrarProd" data-id="${prod.id}">X</a>
          </td>  
        `;
        listaCarrito.appendChild(row);
        
        // 1.1 Guardar el Carrito en el LS llamando a la función
        guardarCarritoLS(); // Hay que crear la función
    })
    console.log(compra);
}

// 1.2 Creamos la función LOCAL STORAGE
function guardarCarritoLS() {
    localStorage.setItem("compra", JSON.stringify(compra))
}

function limpiarHTML() {
    listaCarrito.innerHTML = "";
}


// 2.1 Creamos la función JSON que descargará el archivo
function compraJsonDown() {

    console.log(compra);
    const jsonString = JSON.stringify(compra);

    // 2.2. Crear un blob del string JSON
    const blob = new Blob([jsonString], { type: "application/json" });

    // 2.3. Crear un enlace de descarga
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'compra.json';

    // 2.4. Simular un clic en el enlace para la descarga creada en el punto 4.
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);

}

function cargarCompraLS(){
    const compraRecupLS = localStorage.getItem('compra');
    const compraLS = JSON.parse(compraRecupLS);
    console.log("compra LS = " + compra);
}


function leerArchivo() {
    const input = document.getElementById('fileInput');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const contenido = e.target.result;
            
            try {
                // Parsear el contenido del archivo JSON
                const jsonObject = JSON.parse(contenido);
                
                // Guardar el JSON en el localStorage bajo la clave 'compra'
                localStorage.setItem('compra', JSON.stringify(jsonObject));
                console.log('Archivo JSON cargado y almacenado en localStorage como "compra"');
                location.reload();

            } catch (error) {
                console.error('Error al parsear el archivo JSON:', error);
                alert('El archivo seleccionado no es un JSON válido.');
            }
        };
        
        reader.readAsText(file);
    } else {
        alert("Por favor selecciona un archivo primero.");
    }
}


/************************ FIN REGION 1 - FINAL SCRIPT  **************************/

