using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Nutricionista : Enemigo
    {
        public Nutricionista(int x, int y, Mapa elmapa, Jugador eljugador)
        {
            CreaEnemigo(x, y, elmapa, eljugador);
        }
        public void Dibuja()
        {
            Console.ForegroundColor = ConsoleColor.Magenta;
            Console.SetCursorPosition(x, y);
            Console.Write('N'); //N de nutricionista
            Console.ResetColor();
        }
        public void Mueve(ConsoleKey tecla)
        {
            int movX = 0;
            int movY = 0;
            switch (tecla)
            {
                case ConsoleKey.UpArrow:
                    movY = -2;
                    break;
                case ConsoleKey.DownArrow:
                    movY = +1;
                    break;
                case ConsoleKey.LeftArrow:
                    movX = -2;
                    break;
                case ConsoleKey.RightArrow:
                    movX = +1;
                    break;
            }
            int nuevoX = x + movX;
            int nuevoY = y + movY;
            if (nuevoX >= 0 && nuevoX < mapa.ancho && nuevoY >= 0 && nuevoY < mapa.alto && mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Suelo)
            {
                x = nuevoX;
                y = nuevoY;
            }
        }
    }
}
