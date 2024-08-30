using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Numerics;
using System.Reflection.PortableExecutable;
using System.Text;

namespace mapa
{
    public class Jugador
    {
           
       public int x, y;       
        Mapa mapa;
       


        public Jugador (int x, int y, Mapa elmapa)
        {
            this.x = x;
            this.y = y;
            mapa = elmapa;

        }

        public void Dibuja()
        {
            Console.SetCursorPosition(x, y);
            Console.Write('@');
        }
        public void Borra()
        {
            Console.SetCursorPosition (x, y);
            
            mapa.celdas[x,y].Dibuja();  
        }
        bool puedeMover(int dondex, int dondey)
        {
           
            if (dondex < 0 || dondex >= mapa.ancho || dondey < 0 || dondey >= mapa.alto)
            {
                return false;
            }

          
            return mapa.celdas[dondex, dondey].terreno != Terreno.Muro;
        }
        public void Mueve(ConsoleKey tecla)
        {
            int nuevoX = x;
            int nuevoY = y;

            switch (tecla)
            {
                case ConsoleKey.UpArrow:
                    nuevoY = y - 1;
                    break;
                case ConsoleKey.DownArrow:
                    nuevoY = y + 1;
                    break;
                case ConsoleKey.LeftArrow:
                    nuevoX = x - 1;
                    break;
                case ConsoleKey.RightArrow:
                    nuevoX = x + 1;
                    break;
            }

            if (puedeMover(nuevoX, nuevoY))
            {
                
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Dinero)
                {
                    Inventario.dinero++; 
                    mapa.celdas[nuevoX, nuevoY].terreno = Terreno.Suelo;

                }
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Verdura)
                {
                    Inventario.Recoger(new Verdura());                 
                    mapa.celdas[nuevoX, nuevoY].terreno = Terreno.Suelo;

                }
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Fruta)
                {
                    Inventario.Recoger(new Fruta());                   
                    mapa.celdas[nuevoX, nuevoY].terreno = Terreno.Suelo;

                }
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Chuches)
                {

                    Inventario.Recoger(new Chuche());
                    if(Inventario.chuches > 0)
                    {
                        Inventario.vida -= 20;
                    }

                    if (Inventario.vida == 0)
                    {
                        using (StreamWriter archivo = File.AppendText("partidas.txt"))
                        {
                            Console.WriteLine("¡Has perdido el juego!");
                            archivo.WriteLine("¡Has perdido el juego!");
                        }
                        Environment.Exit(0);
                    }              
                mapa.celdas[nuevoX, nuevoY].terreno = Terreno.Suelo;

                }
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Salida)
                {


                }
                if (mapa.celdas[nuevoX, nuevoY].terreno == Terreno.Meta)
                {
                    using (StreamWriter archivo = File.AppendText("partidas.txt"))                
                    {
                        if (Inventario.dinero == 0 || (Inventario.verduras == 0 && Inventario.frutas == 0) || Inventario.dinero != (Inventario.frutas + Inventario.verduras))
                        {
                            Console.WriteLine("¡Has perdido el juego!");
                            archivo.WriteLine("¡Has perdido el juego!");
                        }
                        else
                        {
                            Console.WriteLine("¡Has ganado el juego!");
                            archivo.WriteLine("¡Has ganado el juego!");
                        }

                    }
                    Environment.Exit(0); 
                }
          
                x = nuevoX;
                y = nuevoY;
            }
        }

     


    }


}