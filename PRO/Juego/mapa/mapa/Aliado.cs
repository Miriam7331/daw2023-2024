using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public abstract class Aliado
    {
        public int x, y;
        protected Mapa mapa;
        protected Jugador jugador;
        public void CreaAliado(int x, int y, Mapa elmapa, Jugador eljugador)
        {
            this.x = x;
            this.y = y;
            mapa = elmapa;
            jugador = eljugador;
        }
        public void Borra()
        {
            Console.SetCursorPosition(x, y);
            mapa.celdas[x, y].Dibuja();
        }
        public bool puedeMover(int dondex, int dondey)
        {
            if (dondex < 0 || dondex >= mapa.ancho || dondey < 0 || dondey >= mapa.alto)
            {
                return false;
            }
            return mapa.celdas[dondex, dondey].terreno != Terreno.Muro;
        }
        public void AparecerAleatoriamente(Celda[,] celdas)
        {
            Random rnd = new Random();
            int newX, newY;
            do
            {
                newX = rnd.Next(0, mapa.ancho);
                newY = rnd.Next(0, mapa.alto);
            } while (celdas[newX, newY].terreno != Terreno.Suelo);
            x = newX;
            y = newY;
        }
    }
}