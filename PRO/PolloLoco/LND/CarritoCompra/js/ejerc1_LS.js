/*******
 * Funcionando con Agregando Local Storage
 */

//// Diferencias entre LOCAL STORAGE y SESSION STORAGE
// Local Storage puede persistir en el equipo aunque cierres el navegador. 
// Session Storage El contenido se mantiene hasta que cierres el navegador.

//#region 1. LOCAL STORAGE BASE

// Ejemplo 1

// sessionStorage.setItem("jose","pedro");
// localStorage.setItem("jose","pedro");
// Local Storage solo puede almacenar String

// Ejemplo 2 - JSON.stringify()

const producto = {
    nombre: "Procesador Intel I5 5600",
    precio: 300,
} 

// const productoLS = JSON.stringify(producto);
// console.log(producto); // En la consola se muestra el arreglo
// console.log(productoLS); // En la consola se muestra en formato STRING
// console.log(typeof productoLS);// En la consola se muestra el tipo STRING
// localStorage.setItem("producto",productoLS)


// // El mismo ejemplo se puede hacer con Arrays.
const meses = ["enero","febrero", "marzo"];
// const mesesLS = JSON.stringify(meses);
// localStorage.setItem("meses",mesesLS);
// // Si vemos LOCALSTORAGE en el navegador observamos que aparecen meses y producto

// También se podría almacenar producto y meses de la siguiente manera:
localStorage.setItem("producto_1", JSON.stringify(producto));
localStorage.setItem("meses_1", JSON.stringify(meses));

// Obtener datos del LOCAL STORAGE;
// Rescatamos los datos con localStorage.getItem
// Rescatamos producto_1:
// const prodRescatados = localStorage.getItem("producto_1");
// console.log(prodRescatados); // En la consola aparecerá como STRING
// console.log(JSON.parse(prodRescatados)); // En la consola aparecerá como Objeto

// // Rescatamos meses_1
// const mesesRescatados = localStorage.getItem("meses_1");
// console.log(mesesRescatados);// En la consola aparecerá como STRING
// console.log(JSON.parse(mesesRescatados)); // En la consola aparecerá como Objeto

/**************   FIN REGION 1 - Agregar al LocalStorage */



//#region 2. ELIMINAR/ACTUALIZAR LOCALSTORAGE

// Si quieres por ejemplo actualizar meses_1
const mesesArray = JSON.parse(localStorage.getItem("meses_1"));
console.log(mesesArray); // Ya debe aparecer como Array

// Ejemplo, si agregamos un nuevo mes:
mesesArray.push("abril");

// Pasamos a la actualización del local Storage el nuevo valor de meses_1
localStorage.setItem("meses_1",JSON.stringify(mesesArray));
// Ya se debe observar el nuevo valor agregado a meses_1 en LS  = "abril"

// NO hay forma de actualizar directamente cono UPDATE o refresh.....

// Hay un método que limpia el LOCALSTORE que es CLEAR
// localStorage.clear();// Después de aplicarlo se observa como se borra el LOCAL STORAGE