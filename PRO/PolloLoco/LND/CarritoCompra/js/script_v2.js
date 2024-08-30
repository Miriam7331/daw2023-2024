/****
 * Archivo con configuraciones del carro
 */

//#region 1.VARIABLES

// // VARIABLES:
// // Desde este apartado se crearán cada una de las variables o constantes con las que 
// // arrancará nuestro sistema. Con cada paso dado esta lista de variables o constantes
// // puede ir incrementando.

// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito")
// const productos = document.querySelector("#productos");

// console.log(carrito);
// console.log(conteCarrito);
// console.log(listaCarrito);
// console.log(vaciarCarrito);
// console.log(productos);

// // EVENTOS
// // Espacio para los eventListener

// // FUNCIONES
// // Espacio para las funciones

/************************ FIN REGION 1 *************************************** */


//#region 2.AGREGANDO AL OBJETO
// En este apartado se trabajará con los datos que se agregan al Objeto a crear
// Se realizarán los primeros pasos para identificar que productos van a los
// objetos y arreglos que crearemos en la siguiente region.

// // VARIABLES:
// // Desde este apartado se crearán cada una de las variables o constantes con las que 
// // arrancará nuestro sistema. Con cada paso dado esta lista de variables o constantes
// // puede ir incrementando.

// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito");
// const productos = document.querySelector("#productos");


// // EVENTOS
// // Espacio para los eventListener y comienzo para agregar al carrito
// // 2.1 Crearemos una función que permita cargar los datos de los objetos al carrito y
// //     se creará un evento que escuche que cuando se haga click en el botón del artículo
// //     se agregará a un arreglo esos datos
// cargarEventList();
// function cargarEventList(){
//     //Cuando presionas para agregar al carrito
//     productos.addEventListener('click',agregarProd);

// }


// // FUNCIONES
// // Espacio para las funciones
// // 2.2 Creamos la función agregarProd
// function agregarProd(e){// 2.4.1 Tenemos que trabajar con el evento "e"
//    // -- Event.target: https://developer.mozilla.org/es/docs/Web/API/Event/target 
//    // 2.3 Tenemos que ver que elementos tiene el carrito desde su padre.
//     //console.log("presionando en los datos a elegir");// Aparecerá en consola el mensaje cuando se pulse sobre algún lado de los productos.
//     // 2.4 Podemos trabajarlo com eventos con "e"
//     // console.log(e.target.classList.contains("btn"));// 2.5 Usamos contains(). Tenemos botones.
//     // 2.5 Crearemos un if para que solo cuando pulsemos en el boton, nos agregue ese producto.
//     if (e.target.classList.contains("btn")){
//         // console.log("agregando al carrito");// Solo para comprobar 
//         // 2.6 Crearemos una constante que ayudará a ubicar todo de esos productos. Estos en mi caso se encuentran en el thead y tbody de cada "card"
//         const  prodSelec = e.target.parentElement.parentElement;//Constante creada
//         // 2.8 Llamaremos desde aquí a una función con el parámetro "productos" que crearemos para que ejecute la lectura de los datos del producto seleccionado.
//         leerDatosProd(prodSelec);

//     }else{
//         console.log("se pulso en otro lado"); // Solo para comprobar
//     }


// }

// // 2.7 Creamos una función para que lea los datos del "prodSelec"
// function leerDatosProd(prod){
//     // console.log(prod);// Demuestra por consola que etiquetas tiene cada producto "target"

//    2.9 Se crea un objeto que contendrá la información del producto.
//     const infoProd={
//         codigo: prod.querySelector("h5 span").textContent, //En mi caso el código está en un span dentro de un h5
//         nombre: prod.querySelector("h4").textContent, // En mi caso dentro de un h4
//         precio: parseFloat(prod.querySelector("h1").textContent), // Pasado por parsefloat para el numero
//         cantidad:1,
//         id: prod.querySelector("button").getAttribute("data-id"),// ID del producto
//     }
//     console.log(infoProd);
// }

/************************ FIN REGION 2 *************************************** */



//#region 3.ARREGLO
// // En este apartado comenzamos a trabajar el objeto como tal almacenándolo en un arreglo
// // Espacio para las funciones

// // VARIABLES:
// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito");
// const productos = document.querySelector("#productos");
// // 3.1 Creamos variable con "let" que será nuestro Arreglo[]
// let compra = []; // Arreglo vacío


// // EVENTOS
// cargarEventList();
// function cargarEventList() {
//     productos.addEventListener('click', agregarProd);
// }

// // FUNCIONES
// function agregarProd(e) {
//     if (e.target.classList.contains("btn")) {
//         const prodSelec = e.target.parentElement.parentElement;
//         leerDatosProd(prodSelec);
//     } else {
//         console.log("se pulso en otro lado");
//     }
// }

// function leerDatosProd(prod) {
//     const infoProd = {
//         codigo: prod.querySelector("h5 span").textContent,
//         nombre: prod.querySelector("h4").textContent,
//         precio: parseFloat(prod.querySelector("h1").textContent),
//         cantidad: 1,
//         id: prod.querySelector("button").getAttribute("data-id"),
//     }
//     console.log(infoProd); // Solo para comprobar

//     // 3.2 En este apartado agregaremos los productos al arreglo
//     // compra = [...compra,infoProd]; Ejemplo con Spread Operator
//     compra.push(infoProd);// Lo vamos a hacer con push
//     console.log(compra);

//     // 3.3 Se observa al final de este apartado como por consola podemos ver el objeto 
//     // agregado al carrito de compras "carrito", donde se repite el arreglo impreso
//     // en la consola cada vez que pulsamos y con el objeto agregado al arreglo.
// }

// // En el siguiente apartado mostraremos y comentaremos solo la función que hace el
// // relleno de HTML en el carrito de la compra.

/************************ FIN REGION 3 *************************************** */



//#region 4. CARRO DE COMPRA EN HTML
// En este apartado crearemos el carrito de la compra con los artículos que hemos agregado
// al arreglo que veíamos por consola. Se podrá ver como se agrega cada línea.
// Se debe recordar que es el apartado 4 y que sus puntos serán 4.1, 4.2, etc, y que los 
// comentarios anteriores serán borrados. 

// // VARIABLES:
// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito");
// const productos = document.querySelector("#productos");

// let compra = []; // Arreglo vacío

// // EVENTOS
// cargarEventList();
// function cargarEventList() {
//     productos.addEventListener('click', agregarProd);
// }

// // FUNCIONES
// function agregarProd(e) {
//     if (e.target.classList.contains("btn")) {
//         const prodSelec = e.target.parentElement.parentElement;
//         leerDatosProd(prodSelec);
//     } else {
//         console.log("se pulsó en otro lado");
//     }
// }

// function leerDatosProd(prod) {
//     const infoProd = {
//         codigo: prod.querySelector("h5 span").textContent,
//         nombre: prod.querySelector("h4").textContent,
//         precio: parseFloat(prod.querySelector("h1").textContent),
//         cantidad: 1,
//         id: prod.querySelector("button").getAttribute("data-id"),
//     }
//     console.log(infoProd); // Solo para comprobar
//     compra.push(infoProd);

//     // 4.5 llamamos a la función carrito de compra para que agregue el html  
//     carritoHTML();
// }

// // 4.1 Crearemos una nueva función que creará el carrito de compras.  Este carrito
// // pertenecerá al grupo de funciones y será llamado desde el sitio en el que se 
// // agregue cada comportamiento al carrito

// function carritoHTML() {

//     // 4.8 Llamamos ala función limpiarHTML() antes de agregar al carrito.
//     limpiarHTML();

//     // 4.2 Comenzaremos con la creación de los elementos HTML que se agregan al carro, y
//     // en nuestro ejemplo, se agrega al tbody.
//     // Mediante un foreach() agregaremos cada línea construida
//     compra.forEach(prod => {
//         // 4.3 Creamos la variable "row" para agregar una linea al carrito 
//         let row = document.createElement("tr");
//         // 4.4 Creamos una linea que agrega un string literal con la variable y lo
//         // haremos con innerHTML
//         row.innerHTML =
//             ` <td> ${prod.codigo} </td>
//           <td> ${prod.nombre} </td>
//           <td> ${prod.precio}€ </td>
//           <td> ${prod.cantidad} </td>
//           <td> 
//             <a href="#" class="borrarProd" data-id="${prod.id}">X</a>
//           </td>   
//         `;
//         // 4.6 Aparte de las variables agregadas, agregamos un td con un enlace "a" que 
//         // va a servir para eliminar las lineas que agreguemos. Ahora no agregaremos
//         // comportamiento, pero lo veremos en los siguientes apartados.



//         // 4.5 Agregamos la linea al carro con appendChild().
//         listaCarrito.appendChild(row);

//     })
//     console.log(compra);//Muestra la compra por consola.
// }

// // 4.7 Estamos observando por la consola que se agrega bien el objeto, pero en el 
// // carrito de la compra vemos que no pasa lo mismo, que se duplica el arreglo que se
// // muestra por pantalla. 
// // Para arreglar este problema, lo que haremos es crear una función que elimine el
// // contenido anterior y solo agregue el último cambio con el contenido completo:

// function limpiarHTML() {
//     listaCarrito.innerHTML = "";
// }

/************************ FIN REGION 4 *************************************** */



//#region 5. SUMAR CANTIDAD POR LINEA
// // Como se puede observar en el apartado anterior, se está agregando cada línea según
// // se agrega un artículo. Lo ideal es que aumente la cantidad de artículos y que no
// // aumente en una línea, quedando más limpio y claro el HTML del carrito.
// // En este apartado, tendremos que comprobar si el producto existe y en este ejemplo 
// // trabajaremos con map(): 
// // https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/map 
// // y trabajaremos con some():
// // https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/some


// // VARIABLES:
// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito");
// const productos = document.querySelector("#productos");



// let compra = []; // Arreglo vacío

// // EVENTOS
// cargarEventList();
// function cargarEventList() {
//     productos.addEventListener('click', agregarProd);
// }

// // FUNCIONES
// function agregarProd(e) {
//     if (e.target.classList.contains("btn")) {
//         const prodSelec = e.target.parentElement.parentElement;
//         leerDatosProd(prodSelec);
//     } else {
//         console.log("se pulsó en otro lado");
//     }
// }

// function leerDatosProd(prod) {
//     const infoProd = {
//         codigo: prod.querySelector("h5 span").textContent,
//         nombre: prod.querySelector("h4").textContent,
//         precio: parseFloat(prod.querySelector("h1").textContent),
//         cantidad: 1,
//         id: prod.querySelector("button").getAttribute("data-id"),
//     }

//     // 5.1 Comenzamos creando la constante que nos permitirá revisar con some() si existe el
//     // producto en el carrito antes de agregar la línea nueva.
//     const seRepite = compra.some( prod => prod.id === infoProd.id)
//         // 5.2 Comprobamos con un IF si se repite y se es así hacemos una operación y si no,
//         // agregamos la línea.
//     if(seRepite){
//         // console.log("El producto existe"); // Solo para comprobar
//         // 5.3 En este apartado es donde usaremos el map para que itere sobre los elementos
//         // del carrito de compras y agregue los cambios solicitados a la copia. 
//         // La variable "actualCant" nos almacena la copia para retornar uno de sus
//         // variables, en este caso cantidad.
//         const  actualCant = compra.map( prod=> {
//             // 5.4 Con un if controlamos la variable cantidad para aumentarla
//             if(prod.id === infoProd.id){ 
//                 prod.cantidad++;
//                 return prod;// Se requiere retorno por el nuevo arreglo creado con map
//             }else {
//                 // 5.5 Se retorna porque trae el resto del carrito aunque no estén
//                 // duplicados
//                 return prod; // Retorna no duplicados
//             }            
//         })
//     }else{
//         // console.log("El producto NO existe"); // Solo para comprobar
//         // 5.6 En el caso de que no exista agregamos la línea retornamos el valor del producto
//         // ya que se sigue necesitando el resto del carrito
//         compra.push(infoProd); // 
//     }

//     console.log(infoProd); // Solo para comprobar
//     // 5.7 La siguiente línea se comenta porque ya no se necesita
//     // compra.push(infoProd); 

//     carritoHTML(); // 5.8 Se llama al carritoHTML para que vuelva a hacer el proceso de
//                    // Actualizar las líneas del carrito. 
// }

// function carritoHTML() {
//     limpiarHTML();
//     compra.forEach(prod => {
//         let row = document.createElement("tr");
//         row.innerHTML =
//             ` <td> ${prod.codigo} </td>
//           <td> ${prod.nombre} </td>
//           <td> ${prod.precio}€ </td>
//           <td> ${prod.cantidad} </td>
//           <td> 
//             <a href="#" class="borrarProd" data-id="${prod.id}">X</a>
//           </td>   
//         `;
//         listaCarrito.appendChild(row);
//     })
//     console.log(compra);//Muestra la compra por consola.
// }

// function limpiarHTML() {
//     listaCarrito.innerHTML = "";
// }

// // 5.9 Con el apartado anterior ya podemos dar por concluido el tema de ampliar la
// // cantidad del producto en el carrito añadido. 
// // En el siguiente apartado veremos como eliminamos línea a línea.

/************************ FIN REGION 5 *************************************** */

//#region 6. BORRAR LÍNEA
// Como se indica, se propone a borrar la línea agregada al carrito, lo ideal sería que
// en vez de borrar toda la línea, se ofreciera que se borrara todo o de uno en uno, 
// pero eso lo dejamos para otra ocasión.
// Comenzaremos comentando que al pulsar en la "x", se debe eliminar la línea. Para que
// esto ocurra, debemos de crear una función, que en este caso se llamará:
// eliminarProdCarrito()
// VARIABLES:
const carrito = document.querySelector("#carrito");
const conteCarrito = document.querySelector("#listaCarrito");
const listaCarrito = document.querySelector("table tbody");
const vaciarCarrito = document.querySelector("#vaciarCarrito");
const productos = document.querySelector("#productos");
//6.1 Lo primero que haremos es agregar esa variable de "a" para funcionar
const btnBoLinea = document.querySelector(".borrarProd"); 

let compra = []; // Arreglo vacío;

// EVENTOS
cargarEventList();
function cargarEventList() {
    productos.addEventListener('click', agregarProd);

    // 6.2 Addeventlistener que llama a eliminarProdCarrito
    carrito.addEventListener('click',eliminarProdCarrito);

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

// 6.1 Creamos la función eliminarProdCarrito(), a la cual llamaremos con un addeventListener() desde

function eliminarProdCarrito(e){ // Pasamos como argumento el evento "e" para trabajar con contains
    console.log("Pulsando eliminarProdCarrito"); // Solo para comprobar
    console.log(e.target.classList); // Mostramos las clases para seleccionar la que necesitamos
    // 6.3 Trabajando classlist.contains(): https://developer.mozilla.org/es/docs/Web/API/Element/classList
    if(e.target.classList.contains("borrarProd")){
        console.log("Estamos pulsando sobre borrar"); // Solo para demostrar
        // 6.4 Ahora le asignaremos una variable, para que esta elija el ID que se quiere borrar
        const prodID = e.target.getAttribute("data-id")
        // 6.5 Trabajaremos con Filter() para que nos elija todo menos el seleccionado y nos haga una copia.
        // Filter(): https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
        // Con esta operación lo que hacemos es quitar dejar fuera del arreglo el objeto que no queremos y
        // dejar una copia del resto para volver a agregarla al HTML.
        compra = compra.filter( prod => prod.id !== prodID);
        console.log(compra); // Se observa en la consola como solo se imprime el nuevo arreglo sin lo seleccionado
        // 6.6 Volvemos a llamar a la función carritoHTML para que muestre el carrito en el HTML
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
    })
    console.log(compra);//Muestra la compra por consola.
}

function limpiarHTML() {
    listaCarrito.innerHTML = "";
}

/************************ FIN REGION 6 ****************************************/


//#region 7. BORRAR CARRO HTML
// // En este último apartado, procederemos a borrar el carrito al completo desde el 
// // botón "Vaciar carrito" 

// // VARIABLES:
// const carrito = document.querySelector("#carrito");
// const conteCarrito = document.querySelector("#listaCarrito");
// const listaCarrito = document.querySelector("table tbody");
// const vaciarCarrito = document.querySelector("#vaciarCarrito");
// const productos = document.querySelector("#productos");
// const btnBoLinea = document.querySelector(".borrarProd"); 

// let compra = []; // Arreglo vacío;

// // EVENTOS
// cargarEventList();
// function cargarEventList() {
//     productos.addEventListener('click', agregarProd);
//     carrito.addEventListener('click',eliminarProdCarrito);

//     // 7.2 Creamos un addeventListener() para el botón Vaciar carrito que ejecute la
//     // función vaciarCompra() y que ejecute una función flecha directa que agregue el
//     // arreglo vacío y que luego cargue el carritoHTML();
//     vaciarCarrito.addEventListener('click', ()=>{
//         compra = [];
//         carritoHTML();
//     });
// }

// // FUNCIONES 
// function agregarProd(e) {
//     if (e.target.classList.contains("btn")) {
//         const prodSelec = e.target.parentElement.parentElement;
//         leerDatosProd(prodSelec);
//     } else {
//         console.log("se pulsó en otro lado");
//     }
// }

// function eliminarProdCarrito(e){ 
//     console.log("Pulsando eliminarProdCarrito"); // Solo para comprobar
//     console.log(e.target.classList); 
//     if(e.target.classList.contains("borrarProd")){
//         console.log("Estamos pulsando sobre borrar"); // Solo para demostrar
//         const prodID = e.target.getAttribute("data-id")
//         compra = compra.filter( prod => prod.id !== prodID);
//         console.log(compra); 
//         carritoHTML();
//     }   
// }

// function leerDatosProd(prod) {
//     const infoProd = {
//         codigo: prod.querySelector("h5 span").textContent,
//         nombre: prod.querySelector("h4").textContent,
//         precio: parseFloat(prod.querySelector("h1").textContent),
//         cantidad: 1,
//         id: prod.querySelector("button").getAttribute("data-id"),
//     }
//     const seRepite = compra.some(prod => prod.id === infoProd.id)
//     if (seRepite) {
//         const actualCant = compra.map(prod => {
//             if (prod.id === infoProd.id) {
//                 prod.cantidad++;
//                 return prod;
//             } else {
//                 return prod;
//             }
//         })
//     } else {
//         compra.push(infoProd);
//     }
//     console.log(infoProd); // Solo para comprobar
//     carritoHTML();
// }

// function carritoHTML() {
//     limpiarHTML();
//     compra.forEach(prod => {
//         let row = document.createElement("tr");
//         row.innerHTML =
//             ` <td> ${prod.codigo} </td>
//           <td> ${prod.nombre} </td>
//           <td> ${prod.precio}€ </td>
//           <td> ${prod.cantidad} </td>
//           <td> 
//             <a href="#" class="borrarProd" data-id="${prod.id}">X</a>
//           </td>   
//         `;
//         listaCarrito.appendChild(row);
//     })
//     console.log(compra);//Muestra la compra por consola.
// }

// function limpiarHTML() {
//     listaCarrito.innerHTML = "";
// }

/************************ FIN REGION 7 - FINAL SCRIPT  **************************/


//************************** Temas nuevos ********************************************/
// map(): https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/map 
// some(): https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/some
// classlist.contains(): https://developer.mozilla.org/es/docs/Web/API/Element/classList
// Filter(): https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
