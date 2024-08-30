using System;
using System.Collections.Generic;
using System.Linq;
using System.Reflection.PortableExecutable;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Timers;

namespace mapa
{
    internal class Pantallazo
    {
        private static List<string> Areas = new List<string> { "Frutería", "Verdurería", "Carnicería", "Pescadería", "Zona de Lácteos", "Panadería", "Droguería", "Zona de Bebidas", "Zona de Congelados", "Juguetería" };

        public static void EjecutarJuego()
        {
            Inventario.Bolsillo();
            Mapa mapa = new Mapa(60, 20);
            mapa.RandomWalker();
            Jugador player = new Jugador(30, 10, mapa);
            mapa.Dibuja();
            Madre madre = new Madre(0, 0, mapa, player);
            madre.AparecerAleatoriamente(mapa.celdas); 
            Padre padre = new Padre(0, 0, mapa, player);
            padre.AparecerAleatoriamente(mapa.celdas);
            Nutricionista nutricionista = new Nutricionista(0, 0, mapa, player);
            nutricionista.AparecerAleatoriamente(mapa.celdas);


            Frutera frutera = new Frutera(25, 15, mapa);
          Verdurero verdurero = new Verdurero(35, 5, mapa);


            Maga maga = new Maga(0, 0, mapa, player);
            maga.AparecerAleatoriamente(mapa.celdas);
            Curandero curandero = new Curandero(0, 0, mapa, player);
            curandero.AparecerAleatoriamente(mapa.celdas);
            Druida druida = new Druida(0, 0, mapa, player);
            druida.AparecerAleatoriamente(mapa.celdas);


            string nombreSeccion = AreasSuper();
            Console.WriteLine($"¡Bienvenido a la {nombreSeccion}!");

            int x = 30;
            int y = 10;
            Console.CursorVisible = false;
            ConsoleKey tecla;

            do
            {
                player.Dibuja();
                madre.Dibuja(); 
                padre.Dibuja();
                nutricionista.Dibuja();
                maga.Dibuja();
                druida.Dibuja();
                curandero.Dibuja();
                frutera.Dibuja();
                verdurero.Dibuja();
                Console.SetCursorPosition(66, mapa.alto - 6);
                verdurero.Interactuar(player);
                frutera.Interactuar(player);
                tecla = Console.ReadKey(true).Key;
                player.Borra();
                player.Mueve(tecla);
                madre.Borra(); 
                madre.Mueve(tecla); 
                padre.Borra();
                padre.Mueve(tecla); 
                nutricionista.Borra();
                nutricionista.Mueve(tecla);
                maga.Borra();
                maga.Mueve(tecla);
                curandero.Borra();
                curandero.Mueve(tecla);
                druida.Borra();
                druida.Mueve(tecla);
                Console.SetCursorPosition(x, y);
                mapa.celdas[x, y].Dibuja();
                MostrarOpciones(mapa);
                switch (tecla)
                {
                    case ConsoleKey.D1:
                    case ConsoleKey.NumPad1:
                        Console.SetCursorPosition(6, mapa.alto + 5);
                        StreamReader archivo1 = new StreamReader("Ayudita.txt");
                        string contenido = archivo1.ReadToEnd();
                        Console.WriteLine(contenido);
                        archivo1.Close();
                        break;
                    case ConsoleKey.D2:
                    case ConsoleKey.NumPad2:
                        Console.SetCursorPosition(6, mapa.alto + 1);
                        Inventario.VerMochila();
                        break;
                    case ConsoleKey.D3:
                    case ConsoleKey.NumPad3:
                        Console.SetCursorPosition(6, mapa.alto + 2);
                        Inventario.VenderFruta();
                        break;
                    case ConsoleKey.D4:
                    case ConsoleKey.NumPad4:
                        Console.SetCursorPosition(6, mapa.alto + 3);
                        Inventario.ComerFruta();
                        break;
                    case ConsoleKey.D5:
                    case ConsoleKey.NumPad5:
                        Environment.Exit(0);
                        break;

                }
                using (StreamWriter archivo = File.AppendText("partidas.txt"))
                {
                    if (player.x == madre.x && player.y == madre.y)
                    {
                        Inventario.vida -= 3;
                        if (Inventario.vida <= 0)
                        {
                            Console.WriteLine("Has perdido");
                            archivo.WriteLine("¡Has perdido el juego!");
                            Environment.Exit(0);
                        }
                    }
                    if (player.x == padre.x && player.y == padre.y)
                    {
                        Inventario.vida -= 2;
                        if (Inventario.vida <= 0)
                        {
                            Console.WriteLine("Has perdido");
                            archivo.WriteLine("¡Has perdido el juego!");
                            Environment.Exit(0);
                        }
                    }
                    if (player.x == nutricionista.x && player.y == nutricionista.y)
                    {
                        Inventario.vida -= 1;
                        if (Inventario.vida <= 0)
                        {
                            Console.WriteLine("Has perdido");
                            archivo.WriteLine("¡Has perdido el juego!");
                            Environment.Exit(0);
                        }
                    }
                }
                if (player.x == maga.x && player.y == maga.y)
                {
                    Inventario.vida += 1;
                }
                if (player.x == curandero.x && player.y == curandero.y)
                {
                    Inventario.vida += 2;
                }
                if (player.x == druida.x && player.y == druida.y)
                {
                    Inventario.vida += 3;
                }
                if (mapa.celdas[player.x, player.y].terreno == Terreno.Salida)
                {                    
                        EjecutarNuevoMapa(player);                    
                }
            } while (tecla != ConsoleKey.Escape) ;
        }



        public static void EjecutarNuevoMapa(Jugador player)
        {
            Mapa nuevoMapa = new Mapa(60, 20);
            nuevoMapa.RandomWalker();
            Jugador nuevoPlayer = new Jugador(30, 10, nuevoMapa);
            nuevoMapa.Dibuja();
            Madre nuevaMadre = new Madre(0, 0, nuevoMapa, nuevoPlayer);   
            nuevaMadre.AparecerAleatoriamente(nuevoMapa.celdas); 
            Padre nuevoPadre = new Padre(0, 0, nuevoMapa, nuevoPlayer);   
            nuevoPadre.AparecerAleatoriamente(nuevoMapa.celdas);
            Nutricionista nuevaNutricionista = new  Nutricionista(0, 0, nuevoMapa, nuevoPlayer);
            nuevaNutricionista.AparecerAleatoriamente(nuevoMapa.celdas);
            Maga nuevaMaga = new Maga(0, 0, nuevoMapa, nuevoPlayer);
            nuevaMaga.AparecerAleatoriamente(nuevoMapa.celdas);
            Curandero nuevoCurandero = new Curandero(0, 0, nuevoMapa, nuevoPlayer);
            nuevoCurandero.AparecerAleatoriamente(nuevoMapa.celdas);
            Druida nuevaDruida = new Druida(0, 0, nuevoMapa, nuevoPlayer);
            nuevaDruida.AparecerAleatoriamente(nuevoMapa.celdas);


            string nombreSeccion = AreasSuper();
            Console.WriteLine($"¡Bienvenido a la {nombreSeccion}!");
            Console.CursorVisible = false;
            ConsoleKey tecla;

            do
            {
                nuevoPlayer.Dibuja();
                nuevaMadre.Dibuja(); 
                nuevoPadre.Dibuja();
                nuevaNutricionista.Dibuja();
                nuevaDruida.Dibuja();
                nuevaMaga.Dibuja();
                nuevoCurandero.Dibuja();

                tecla = Console.ReadKey(true).Key;
                nuevoPlayer.Borra();
                nuevoPlayer.Mueve(tecla);
                nuevaMadre.Borra();  
                nuevaMadre.Mueve(tecla);
                nuevoPadre.Borra();  
                nuevoPadre.Mueve(tecla);
                nuevaNutricionista.Borra();
                nuevaNutricionista.Mueve(tecla);
                nuevoCurandero.Borra();
                nuevoCurandero.Mueve(tecla);
                nuevaMaga.Borra();
                nuevaMaga.Mueve(tecla);
                nuevaDruida.Borra();
                nuevaDruida.Mueve(tecla);




                nuevoMapa.celdas[nuevoPlayer.x, nuevoPlayer.y].Dibuja();
                MostrarOpciones(nuevoMapa);
                switch (tecla)
                {
                    case ConsoleKey.D1:
                    case ConsoleKey.NumPad1:
                        Console.SetCursorPosition(6, nuevoMapa.alto + 5);
                        StreamReader archivo1 = new StreamReader("Ayudita.txt"); 
                        string contenido = archivo1.ReadToEnd();
                        Console.WriteLine(contenido);
                        archivo1.Close();
                        break;
                    case ConsoleKey.D2:
                    case ConsoleKey.NumPad2:
                        Console.SetCursorPosition(6, nuevoMapa.alto + 1);
                        Inventario.VerMochila();
                        break;
                    case ConsoleKey.D3:
                    case ConsoleKey.NumPad3:
                        Console.SetCursorPosition(6, nuevoMapa.alto + 2);
                        Inventario.VenderFruta();
                        break;
                    case ConsoleKey.D4:
                    case ConsoleKey.NumPad4:
                        Console.SetCursorPosition(6, nuevoMapa.alto + 3);
                        Inventario.ComerFruta();
                        break;
                    case ConsoleKey.D5:
                    case ConsoleKey.NumPad5:
                        Environment.Exit(0);
                        break;
                }
                if (nuevoMapa.celdas[nuevoPlayer.x, nuevoPlayer.y].terreno == Terreno.Salida)
                {
                    EjecutarNuevoMapa(nuevoPlayer);
                }
            } while (tecla != ConsoleKey.Escape);
        }
        public static void MostrarOpciones(Mapa mapa)
                {
               
                    Console.SetCursorPosition(66, mapa.alto -12);
                    Console.WriteLine("¡Ayuda al niño goloso!");
                    Console.SetCursorPosition(66, mapa.alto -11);
                    Console.WriteLine("Flechas para moverte.");
                    Console.SetCursorPosition(66, mapa.alto -10);
                    Console.WriteLine("Vidas: " + Inventario.vida);
                    Console.SetCursorPosition(66, mapa.alto -9);
                    Console.WriteLine("Dinero: " + Inventario.dinero);
                    Console.SetCursorPosition(66, mapa.alto -8);
                    Inventario.VerMochila();          
                    Console.WriteLine();
                    Console.SetCursorPosition(66, mapa.alto - 18);
                    Console.WriteLine("1. Ayuda");
                    Console.SetCursorPosition(66, mapa.alto - 17);
                    Console.WriteLine("2. Mostrar Inventario"); //se puede borrar
                    Console.SetCursorPosition(66, mapa.alto - 16);
                    Console.WriteLine("3. Vender fruta/Verdura");
                    Console.SetCursorPosition(66, mapa.alto - 15);
                    Console.WriteLine("4. Comer fruta/verdura");
                    Console.SetCursorPosition(66, mapa.alto - 14);
                    Console.Write("5. Salir");
                }
        private static string AreasSuper()
        {
            Random rnd = new Random();
            int index = rnd.Next(Areas.Count);
            return Areas[index];
        }
    }
} 