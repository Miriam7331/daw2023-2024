/***** 
 * Comportamientos del sitio
 */

/* Sobre el carrito */
// 1 Paso
const carrito = document.querySelector("#carrito");
const productos = document.querySelector("#productos");
const listaCarrito = document.querySelector("table tbody");
const vaciarCarrito = document.querySelector("#vaciarCarrito")
let prodAlCarrito = [] // 11. Se crea un arreglo vacío
// console.log(vaciarCarrito.outerHTML);


// 2. paso - Eventos
cargarEventList(); // 2. paso
function cargarEventList() {
    productos.addEventListener('click', agregarProd);// Agregar al carrito

    // 18. Eliminar producto del carrito
    // Usaremos la id de "carrito" que la tiene el div padre de la tabla del cual creamos una variable llamada "carrito"
    carrito.addEventListener('click', elimProdCarrito);

    // 19. Vaciar el carrito de compra
    vaciarCarrito.addEventListener('click',()=>{
        // console.log("vaciando carrito"); // Comprueba la funcionalidad del botón
        prodAlCarrito = [] // Llamamos de nuevo al arreglo vacío
        carritoHTML(); // Volvemos a mostrar el HTML vacío
    });

}


// 3. paso - Funciones del proyecto 

function agregarProd(e) { // 4 paso 
    // console.log(e.target.parentElement.parentElement); // Identificado el padre de cada card
    const prodSelect = e.target.parentElement.parentElement // 5. Creamos constante de ese elemento padre 
    if (e.target.classList.contains("btn")) { // 6. Quedan elegidos los botones
        leerDatosProd(prodSelect);
    } else {
        // console.log("pulsando fuera");
    }

}

// 18.1 Eliminar individualmente un producto del carrito
function elimProdCarrito(e) {
    // console.log("Eliminar desde el carrito"); // 18.2 comentar para L.S.L.
    // console.log(e.target.classList);// Solo para ver la clase que buscare para usarla
    if (e.target.classList.contains("borrarProd")) {
        // console.log("pulsando sobre borrar prod - " + e.target.classList);// Funciona
        // console.log(e.target.getAttribute("data-id"));//Muestra la ID a seleccionar y elimi
        const prodID = e.target.getAttribute("data-id") // Id a eliminar

        //Eliminaremos el arreglo por el data-ID usando el método filter
        prodAlCarrito = prodAlCarrito.filter(prod => prod.id !== prodID);
        // El filter nos creará un arreglo con todos los diferentes a el ID seleccionado
        // console.log(prodAlCarrito); // Se observa que el arreglo en la consola elimina la fila seleccionada no descuenta 1 de la cantidad

        carritoHTML();
    }

}


// 9. Leer la información de cada producto y traerlo al carrito
function leerDatosProd(prod) {// Recuerda que "cursos" es simplemente el parámetro al que se invoca
    // console.log(prod);
    // 10. Crearemos un objeto para agregar todo del producto
    const infoProducto = {
        nombre: prod.querySelector("h4").textContent, // Agregamos el elemento al objeto
        codigo: prod.querySelector("h5>span").textContent,
        precio: parseFloat(prod.querySelector("h1").textContent),
        cantidad: 1,
        id: prod.querySelector("button").getAttribute("data-id"),//Creado en el punto 16
    }

    // console.log(infoProducto);// Observamos que los elementos se agregan al objeto

    // #region 17. 
    //NO REPEAT Revisar si un elemento ya existe en el carrito para incrementar su valor y que solo aparezca 1 ves con el aumento de las cantidades. Se utilizará la propiedad "some" para recorrer el carrito y comprobarlo.

    const existe = prodAlCarrito.some(prod => prod.id === infoProducto.id);
    console.log(existe);// Muestra por pantalla true o false si el carro tiene un artículo igual al que pulsaste para agregar de nuevo.

    if (existe) {
        //Actualizamos cantidad del carrito
        // 17.1 Iteraremos con "map" el cual nos hará otro arreglo para poner el actualizado.
        const productos = prodAlCarrito.map(prod => {
            if (prod.id === infoProducto.id) {
                prod.cantidad++;
                return prod; // 17.2 Recuerden que map saca un nuevo arreglo y actualiza el valor
            } else {
                return prod; // 17.3 Retorna los objetos que no están duplicados porque siguen siendo importantes para el carrito.
            }
        });
        // 17.4 Esta linea se comento porque no hacía falta aunque entrara en el video.
        // prodAlCarrito.push(infoProducto); //Agregamos el arreglo actualizado

    } else {
        //Agregamos el curso al carrito 
        prodAlCarrito.push(infoProducto);// Lo hacemos con push
        // console.log(prodAlCarrito); // Solo para mostrar si el Else funciona
    }
    console.log(prodAlCarrito);




    // 12. Agregar el curso al carrito de compra
    // prodAlCarrito.push(infoProducto);// Lo hacemos con push 
    // console.log(prodAlCarrito);
    // 17.1 El apartado anterior fué comentado porque en el punto 17 se pasó a comprobar que el carrito agregara solo si el producto noe existía.

    // 14. llamamos la función carritoHTML() 
    carritoHTML();
}

 // 13. Mostrar el carrito de compra en el HTML
 function carritoHTML() {

    // 16. Limpiar HTML
    eliminarHtml();
    // Fin de limpiar HTML

    // 12.1 Agregar el curso al carrito de compra
    prodAlCarrito.forEach(prod => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${prod.codigo}</td>
            <td>${prod.nombre}</td>
            <td>${prod.precio}€</td>
            <td>${prod.cantidad}</td>
            <td>
                <a href="#" class="borrarProd" data-id="${prod.id}">X</a> 
            </td>
              
        `;
        // Agrega el HTML del carrito en el tbody
        listaCarrito.appendChild(row);

    })

}


// 15. Crear función que limpia el html para que no se agregue duplicado el arreglo, ya que cada vez que agregamos un arreglo, este va acumulando lo que vamos seleccionando.
function eliminarHtml() {
    listaCarrito.innerHTML = "";//Llena con un string vacío listaCarrito
}



// Código aconsejado pero no usado
// // Eliminar los cursos del carrito "t-body" al completo
// function limpiarCarrito() {
//     // Forma convencional lenta

//     while (listaCarrito.firstChild) {// Esto eliminará cada hijo de la lista
//         listaCarrito.removeChild(listaCarrito.firstChild)
//     }// Se ejecutará hasta el final

// }
