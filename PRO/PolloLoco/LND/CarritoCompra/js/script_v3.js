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

let compra = []; // Arreglo vacío;

// EVENTOS
cargarEventList();
function cargarEventList() {
    productos.addEventListener('click', agregarProd);
    carrito.addEventListener('click',eliminarProdCarrito);

    // 1.3 Agregar compra desde localStorage
    document.addEventListener('DOMContentLoaded', ()=>{
        // 1.4 Cargamos el documento que se encuentra en Local Storage además, le decimos o un arreglo vacío
        compra = JSON.parse(localStorage.getItem(compra)) || []

        // 1.5 Llamamos de nuevo a la función carritoHTML() para volver a agregar el html
        carritoHTML();
    })
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

function eliminarProdCarrito(e){ 
    console.log("Pulsando eliminarProdCarrito"); // Solo para comprobar
    console.log(e.target.classList); 
    if(e.target.classList.contains("borrarProd")){
        console.log("Estamos pulsando sobre borrar"); // Solo para demostrar
        const prodID = e.target.getAttribute("data-id")
        compra = compra.filter( prod => prod.id !== prodID);
        console.log(compra); 
        carritoHTML();
        localStorage.clear();
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
        row.innerHTML =
            ` <td> ${prod.codigo} </td>
          <td> ${prod.nombre} </td>
          <td> ${prod.precio}€ </td>
          <td> ${prod.cantidad} </td>
          <td> 
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
function guardarCarritoLS(){
    localStorage.setItem("compra", JSON.stringify(compra))
}

function limpiarHTML() {
    listaCarrito.innerHTML = "";
   
}

/************************ FIN REGION 1 - FINAL SCRIPT  **************************/

