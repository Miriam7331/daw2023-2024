using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public static class Menu
    {
         
        public static void MostrarMenu()
        {
            Console.WriteLine("Menu:");
            Console.WriteLine("1. Descubre la historia");
            Console.WriteLine("2. Ayuda");
            Console.WriteLine("3. Jugar");
            Console.WriteLine("4. Salir");
            Console.WriteLine();
        }

        public static ConsoleKey Opciones()
        {
            ConsoleKey tecla;
            do
            {
                MostrarMenu();
                tecla = Console.ReadKey(true).Key;
                Console.Clear();

                switch (tecla)
                {
                    case ConsoleKey.D1:
                    case ConsoleKey.NumPad1:
                        MostrarArchivo("Historia.txt");
                        break;
                    case ConsoleKey.D2:
                    case ConsoleKey.NumPad2:
                        MostrarArchivo("Ayuda.txt");
                        break;
                    case ConsoleKey.D3:
                    case ConsoleKey.NumPad3:
                        return tecla; 
                    case ConsoleKey.D4:
                    case ConsoleKey.NumPad4:
                        Environment.Exit(0);
                        break;
                }
            } while (true);
        }

        private static void MostrarArchivo(string nombreArchivo)
        {
            try
            {
                using (StreamReader archivo = new StreamReader(nombreArchivo))
                {
                    string contenido = archivo.ReadToEnd();
                    Console.WriteLine(contenido);
                }
            }
            catch (FileNotFoundException)
            {
                Console.WriteLine($"Error: El archivo '{nombreArchivo}' no existe.");
            }
            catch (Exception ex)
            {
                Console.WriteLine("Error: " + ex.Message);
            }
            Console.WriteLine();
            Console.WriteLine("Presiona cualquier tecla para volver al menú...");
            Console.ReadKey(true);
        }
    }



}
