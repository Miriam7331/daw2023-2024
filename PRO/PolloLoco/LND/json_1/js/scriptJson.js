
// Creando un JSON y exportar el archivo creado.

document.getElementById('btnDescarga').addEventListener('click', function() {
    // 1. Crear el Objeto JSON a exportar
    const persona = {
        nombre: "Juan",
        edad: 30,
        fechaNac: "10/11/2000",
        direcc: "Calle Pejin, La Oliva, CP: 35640, Las Palmas GC",
    };

    // 2. Convertir el objeto JSON a string
    const personaJS = JSON.stringify(persona);
    // Guardarlo en Local Storage

    // 3. Crear un blob del string JSON
    const blob = new Blob([personaJS], { type: "application/json" });

    // 4. Crear un enlace de descarga
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = json;
    a.download = 'persona.json';

    // 5. Simular un clic en el enlace
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
});