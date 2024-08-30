<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo JSON</title>
</head>
<body>
    <input type="file" id="fileInput" />
    <button onclick="leerArchivo()">Cargar Archivo</button>
    <pre id="fileContent"></pre>

    <script>
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
    </script>
</body>
</html>
