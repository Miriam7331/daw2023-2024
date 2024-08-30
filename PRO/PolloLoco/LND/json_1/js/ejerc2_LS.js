

 // Paso 1: Datos de ejemplo en localStorage
 const datosFactura = [
    {codigo: '1000001', nombre: 'Base', precio: 7, cantidad: 2, id: '1'},
    {codigo: '1000002', nombre: 'Pro', precio: 15, cantidad: 2, id: '2'}
];

// Guardar los datos en localStorage (Esto es solo un ejemplo, en la práctica ya tendrías los datos almacenados)
localStorage.setItem('factura', JSON.stringify(datosFactura));

// Paso 2: Recuperar los datos del localStorage y parsearlos
const datosRecuperados = localStorage.getItem('factura');
const factura = JSON.parse(datosRecuperados);

// Paso 3: Calcular el total de la factura
const totalFactura = factura.reduce((acumulador, item) => {
    return acumulador + (item.precio * item.cantidad);
}, 0);

// Paso 4: Mostrar los datos en la tabla y el total en el HTML
const facturaBody = document.getElementById('factura-body');
const totalFacturaElement = document.getElementById('total-factura');

factura.forEach(item => {
    const row = document.createElement('tr');

    const codigoCell = document.createElement('td');
    codigoCell.textContent = item.codigo;
    row.appendChild(codigoCell);

    const nombreCell = document.createElement('td');
    nombreCell.textContent = item.nombre;
    row.appendChild(nombreCell);

    const precioCell = document.createElement('td');
    precioCell.textContent = item.precio;
    row.appendChild(precioCell);

    const cantidadCell = document.createElement('td');
    cantidadCell.textContent = item.cantidad;
    row.appendChild(cantidadCell);

    const totalCell = document.createElement('td');
    totalCell.textContent = item.precio * item.cantidad;
    row.appendChild(totalCell);

    facturaBody.appendChild(row);
});

totalFacturaElement.textContent = totalFactura;