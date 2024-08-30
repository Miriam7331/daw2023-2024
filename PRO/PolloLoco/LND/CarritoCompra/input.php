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
                    // Aquí puedes trabajar con el contenido del archivo
                    const jsonObject = JSON.parse(contenido);
                    console.log(jsonObject);

                    // Mostrar el contenido en la página
                    document.getElementById('fileContent').textContent = JSON.stringify(jsonObject, null, 2);
                };
                
                reader.readAsText(file);
            } else {
                alert("Por favor selecciona un archivo primero.");
            }
        }
    </script>
</body>
</html>
