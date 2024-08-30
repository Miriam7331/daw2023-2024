using System;
using System.Collections.Generic;
using System.ComponentModel.Design;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Mapa
    {
        public Celda[,] celdas;
        public int ancho; 
        public int alto;
  


        public Mapa(int ancho, int alto)
        {
            this.ancho = ancho;
            this.alto= alto;
            celdas=new Celda[ancho,alto]; 

            for (int i = 0; i < ancho; i++)
            {
                for (int j = 0; j < alto; j++)
                {
                    celdas[i, j] = new Celda(); 
                }
            }

        }

        public void mapita(int ancho, int alto)
        {
            this.ancho = ancho;
            this.alto = alto;
            celdas = new Celda[ancho, alto];

            for (int i = 0; i < ancho; i++)
            {
                for (int j = 0; j < alto; j++)
                {
                    celdas[i, j] = new Celda();
                }
            }
        }

        public void RandomWalker()
        {
            Random rng = new Random();
            int maxSuelo = (int)(ancho * alto * 0.5);  

            int x = ancho / 2;
            int y = alto / 2;

            celdas[x, y].terreno = Terreno.Suelo;
            int cont = 1;
            while (cont< maxSuelo)
            {
                int direccion = rng.Next(4);
                int newX = x;
                int newY = y;
                switch (direccion)
                {
                    case 0:
                        newY--;
                        break;

                    case 1: 
                        newX++;
                        break;
                    case 2:
                        newY++;
                        break;
                    case 3:
                        newX--;
                        break;

                }

               
                    if (newX > 0 && newX < ancho - 1 && newY > 0 && newY < alto - 1)
                    {
                        if (celdas[newX, newY].terreno == Terreno.Muro)
                        {
                            celdas[newX, newY].terreno = Terreno.Suelo;
                            cont++;
                         }
      
                    x = newX;
                    y = newY;
                    }
            }


            for (int i = 0; i < 20; i++)
            {
                int randX, randY;
                do
                {
                    randX = rng.Next(0, ancho);
                    randY = rng.Next(0, alto);
                } while (celdas[randX, randY].terreno != Terreno.Suelo);

                if (i < 1)
                {
                    celdas[randX, randY].terreno = Terreno.Salida;
                }
                else if (i < 2)
                {
                    celdas[randX, randY].terreno = Terreno.Meta;
                }
                else if (i < 5)
                {
                    celdas[randX, randY].terreno = Terreno.Dinero;
                }
                else if (i>5 & i < 10)
                {
            
                    celdas[randX, randY].terreno = Terreno.Fruta;
                }
                else if (i > 10 & i < 15)
                {

                    celdas[randX, randY].terreno = Terreno.Verdura;
                }
                else
                {
                   
                    celdas[randX, randY].terreno = Terreno.Chuches;
                }
            }
       
        }

        public void Dibuja()
        {
           for(int i = 0; i < ancho; i++)
            {
                for(int j = 0; j<alto;  j++)
                {
                    Console.SetCursorPosition(i, j); 
                    celdas[i,j].Dibuja();
                }
            }
        }




    }
}