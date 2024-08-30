@echo off
:menu
    cls
    echo.     Menu
    echo.
    echo.     1.- Opcion - 1 Modifique la hora
    echo.     2.- Opcion - 2 Cambie los colores del fondo y la letra
    echo.     3.- Opcion - 3 Cree una copia de seguridad
    echo.     4.- Opcion - 4 Abra la web de Majada Marcial
    echo.     5.- salir
    echo.
    set /P Opc=Su opcion elegida es:
 
    IF "%Opc%"    ==  ""   goto :EOF
    IF "%Opc%"    ==  "5"  goto :EOF
    IF "%Opc%"    ==  "4"  goto Opc_4
    IF "%Opc%"    ==  "3"  goto Opc_3
    IF "%Opc%"    ==  "2"  goto Opc_2
    IF "%Opc%"    ==  "1"  goto Opc_1
                           goto Menu
:Opc_1
    echo Opcion - 1 Modifique la hora
    echo.
    set /P NuevoTiempo=Escriba la hora nueva con este formato HH:MM: 
    time %NuevoTiempo%
    pause
    goto Menu
:Opc_2
echo Opcion - 2 Cambie los colores del fondo y la letra
    echo.
    echo Seleccione el color del texto
    echo 1. Azul
    echo 2. Verde
    echo 3. Aguamarina
    echo 4. Rojo

    set /P ColorTexto=Seleccione el color del texto: 
    echo.

    echo Seleccione el color de la pantalla
    echo 0. Negro
    echo 1. Azul
    echo 2. Verde
    echo 3. Aguamarina
    echo 4. Rojo
    echo 5. Púrpura
    echo 6. Amarillo
    echo 7. Blanco
    echo 8. Gris

    set /P ColorFondo=Seleccione el color de la pantalla: 
    echo.

    color %ColorFondo%%ColorTexto%
    pause
    goto Menu
:Opc_3
    echo Opcion - 3 Cree una copia de seguridad
    echo.
    set /P "CarpetaBackup=Escriba la ruta de la carpeta que desee crear una copia de seguridad.
    mkdir "%USERPROFILE%\Desktop"\SAVE"
    xcopy "%CarpetaBackup%" "%USERPROFILE%\Desktop\SAVE"

    echo.
    echo Se ha creado correctamente la copia de seguridad
    pause
    goto Menu
:Opc_4
    echo Opcion - 4 Abra la web de Majada Marcial
    echo.
    start "" "https://cifpmajadamarcial.com/"
    pause
    goto Menu