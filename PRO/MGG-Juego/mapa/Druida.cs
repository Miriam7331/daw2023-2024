using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Druida : Aliado
    {
        public Druida(int x, int y, Mapa elmapa, Jugador eljugador)
        {
            CreaAliado(x, y, elmapa, eljugador);
        }
        public void Dibuja()
        {
            Console.ForegroundColor = ConsoleColor.DarkCyan;
            Console.SetCursorPosition(x, y);
            Console.Write('&'); 
            Console.ResetColor();
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