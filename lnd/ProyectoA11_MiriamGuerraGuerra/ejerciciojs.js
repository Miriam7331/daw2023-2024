//Ejercicio 9 del sorteo realizado en la página de "trabaja con nosotros"

t = document.getElementById("text")
t.innerHTML = "¿Quieres trabajar con nosotros? Rellena las siguientes preguntas para ver si eres apto."
t.style.border = "solid 3px red"
t.style.color = "black"
t.style.fontSize = "30px"

t = document.getElementById("text1")
t.innerHTML = "Primero necesitamos saber si estás en edad de trabajar, para ello indica si eres hombre o mujer y tu edad en los apartados correspondientes."
t.style.color = "black"
t.style.fontSize = "20px"

function verificarJubilacion() {
    var edad = parseInt(document.getElementById("edad").value);
    var genero = document.getElementById("genero").value;
    var resultadoJubilacion;
    if (edad >= 1 && edad <= 110) {
        if ((genero === 'F' && edad >= 60) || (genero === 'M' && edad >= 65)) {
            resultadoJubilacion = "Está en edad para jubilarse.";
        } else {
            resultadoJubilacion = "No está en edad para jubilarse.";
        }
    } else {
        resultadoJubilacion = "Por favor, introduzca una edad válida (entre 1 y 110 años).";
    }
    document.getElementById("resultado").innerText = resultadoJubilacion;
}

// Ejercicio  8.d realizado en la página de "trabaja con nosotros"

t = document.getElementById("text3")
t.innerHTML = "Danos tus datos y te contactaremos."
t.style.color = "black"
t.style.fontSize = "30px"

t = document.getElementById("text2")
t.innerHTML = "A continuación rellena el siguiente formulario si estás en edad de trabajar."
t.style.color = "black"
t.style.fontSize = "25px"

t = document.getElementById("text4")
t.innerHTML = "Puedes introducir los datos de tantas personas como quieras."
t.style.color = "black"
t.style.fontSize = "20px"

function rellenarTabla() {
    var tabla = document.getElementById("tabla");

    for (var i = 0; i < 1; i++) {
        var fila = tabla.insertRow();
        for (var j = 0; j < 5; j++) {
            var celda = fila.insertCell();
            var valor = prompt("Introduce el valor para la fila 1 " + ", columna " + (j + 1) + ":");
            celda.innerText = valor;
        }
    }
}

function error() {
    document.getElementById("text5").innerHTML = "Lamentamos informarle de que ha ocurrido un error al enviar la solicitud. Por favor, contacte con nosotros explicando este error. Muchas gracias y disculpe las molestias que esto le haya podido ocacionar. Si quiere también puede adjuntar su CV, muchas gracias.";
}

// Elemento para navegar en las 'galerias' (tienda)

$("nav").find("a").click(function (e) {
    e.preventDefault();
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top
    });
});

// Función utilizada en la página de 'carrito'

function dobleerror() {
    document.getElementById("texto1").innerHTML = "Los sentimos, sigue sin funcionar. Por favor, inténtelo de nuevo más tarde.";
    document.getElementById("texto2").innerHTML = "Disculpe las molestias, si quiere puede continuar explorando otras páginas mientras resolvemos este error, gracias.";
    document.getElementById("texto3").innerHTML = "Si persiste el error, por favor, póngase en contacto con nosotros para que podamos ayudarle a tramitar la compra lo antes posible y solucionar este problema en la web, muchas gracias.";

}

// Funciones utilizadas en la página 'mi cuenta'

function errormail() {
    document.getElementById("texto4").innerHTML = "Lamentamos informarle de que no hemos podido encontrar su usuario en nuestra base de datos. Por favor, contacte con nosotros explicando este error. Muchas gracias y disculpe las molestias que esto le haya podido ocacionar.";
}

function errornuevo() {
    document.getElementById("texto5").innerHTML = "Lamentamos informarle de que estamos gestionando ahora mismo nuestras bases de datos por este motivo no puede registrarse un nuevo usuario en este momento, por favor inténtelo más tarde. Gracias.";
}

// Modificar el menú dropdown en las páginas de 'carrito' y 'mi cuenta'

function cambiarEstilo(buttonId) {
    var buttons = document.getElementsByClassName("button");

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].style.backgroundColor = "";
        buttons[i].style.fontSize = "";
    }

    var button = document.getElementById(buttonId);
    button.style.backgroundColor = "red";
    button.style.fontSize = "20px";
}

t = document.getElementById("text10")
t.style.color = "white"
t.style.fontSize = "20px"

//Funciones de la página 'videos'

function mostrar() {
    var contenido = document.getElementById("contenido");
    contenido.style.display = "block";
  }


  function ocultar() {
    var contenido = document.getElementById("contenido");
    contenido.style.display = "none";
  }

// Botón cambia color fondo y párrafo en web 'home', 'contacto' y las dos 'galerías'

var el_up = document.getElementById("color_arriba");
var el_down = document.getElementById("color_abajo");
var str = "toca boton para cambiar color";


el_up.innerHTML = str;

function changeColor(color) {
    document.body.style.background = color;
}
  
function color() {
    changeColor('black');
    var texto = document.getElementById("cambiar");
    texto.style.color = 'white';
    titulos('white'); 
    el_down.innerHTML = "Color cambiado";
}    


  function titulos(color) {
    var titulos = document.querySelectorAll('h2, h3, h4, h5, h6, p');
    for (var i = 0; i < titulos.length; i++) {
      titulos[i].style.color = color;
    }
  }

// Botón devolver todo a como estaba originalmente en las web de 'home', 'contacto' y ambas 'galerías'

function restaurarColor() {
    changeColor('white');
    var texto = document.getElementById("texto_a_cambiar");
    texto.style.color = 'black';
    titulos('black'); 
    el_up.innerHTML = "Color cambiado";
  }

//ocultar aside

function aside() {
    var aside = document.getElementById("aside");
    if (aside.style.display === "block") {
      aside.style.display = "none";
    } else {
      aside.style.display = "block";
    }
  }

