using System;
using System.Collections.Generic;
using System.Linq;
using System.Numerics;
using System.Text;
using static System.Runtime.InteropServices.JavaScript.JSType;

namespace mapa
{
    public class Madre : Enemigo
    {
        public Madre(int x, int y, Mapa elmapa, Jugador eljugador)
        {
            CreaEnemigo(x,y, elmapa, eljugador);                      
        }
        public void Dibuja()
        {
            ConsoleColor color = ObtenerColorAleatorio();
            Console.ForegroundColor = color;
            Console.SetCursorPosition(x, y);
            Console.Write('M'); //M de madre
            Console.ResetColor(); 
        }
        private ConsoleColor ObtenerColorAleatorio()
        {
            Random random = new Random();
            ConsoleColor[] colores =
            {
                ConsoleColor.Red,
                ConsoleColor.DarkBlue,
                ConsoleColor.Magenta,
                ConsoleColor.White,
                ConsoleColor.Black,
                ConsoleColor.DarkGray
            };

            return colores[random.Next(colores.Length)];
        }
        public void Mueve(ConsoleKey tecla)
        {
            int nuevoX = x;
            int nuevoY = y;
            int distanciaMovimiento = 1; 
           
            switch (tecla)
            {
                case ConsoleKey.UpArrow:
                    while (nuevoY - distanciaMovimiento >= 0 && mapa.celdas[x, nuevoY - distanciaMovimiento].terreno != Terreno.Muro)
                    {
                        distanciaMovimiento++;
                    }
                    nuevoY -= distanciaMovimiento - 1;
                    break;
                case ConsoleKey.DownArrow:
                    while (nuevoY + distanciaMovimiento < mapa.alto && mapa.celdas[x, nuevoY + distanciaMovimiento].terreno != Terreno.Muro)
                    {
                        distanciaMovimiento++;
                    }
                    nuevoY += distanciaMovimiento - 1;
                    break;
                case ConsoleKey.LeftArrow:
                    while (nuevoX - distanciaMovimiento >= 0 && mapa.celdas[nuevoX - distanciaMovimiento, y].terreno != Terreno.Muro)
                    {
                        distanciaMovimiento++;
                    }
                    nuevoX -= distanciaMovimiento - 1;
                    break;
                case ConsoleKey.RightArrow:
                    while (nuevoX + distanciaMovimiento < mapa.ancho && mapa.celdas[nuevoX + distanciaMovimiento, y].terreno != Terreno.Muro)
                    {
                        distanciaMovimiento++;
                    }
                    nuevoX += distanciaMovimiento - 1; 
                    break;
            }
          
            x = nuevoX;
            y = nuevoY;
        }
    }
}
