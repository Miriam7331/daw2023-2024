using System;
using System.Collections.Generic;
using System.Linq;
using System.Numerics;
using System.Runtime.CompilerServices;
using System.Text;

namespace mapa
{
    public static class Inventario
    {
      
        public static List<IFrutaVerdura> mochila;
        public static int dinero;
        public static int chuches;
        public static int vida;
        public static int frutas;
       public static  int verduras;

        public static void Bolsillo()
        {
            mochila = new List<IFrutaVerdura>();
            dinero = 0;
            vida = 100; // Vida inicial, cuenta como 100 aunque se vea 10
            frutas = 0;
            verduras = 0;
            chuches = 0;
        }


        public static void Recoger(IFrutaVerdura item)
        {
            mochila.Add(item);

            if (item is Fruta)
            {
                frutas++;
            }
            else if (item is Verdura)
            {
                verduras++;
            }

            else if (item is Chuche)
            {
                chuches++;
               
            }
          
        }

       
        public static void VenderFruta()
        {
            if(mochila.Count > 0)
            {

                foreach (var item in mochila)
                {
                    if (item is Fruta)
                    {
                        frutas--;
                        dinero += 5;
                        mochila.Remove(item);
                        break; 
                    }
                    else if (item is Verdura)
                    {
                        verduras--;
                        dinero += 5;
                        mochila.Remove(item);
                        break; 
                    }
                }
                
                Console.WriteLine("Has vendido una fruta/verdura y ganado 5 monedas");
                
            }
            else
            {
                Console.WriteLine("No puedes vender nada.                          ");
            }
        }

        
        public static void ComerFruta()
        {
            if(mochila.Count > 0)
            {

                foreach (var item in mochila)
                {
                    if (item is Fruta)
                    {
                        frutas--;
                        vida += 10;
                        mochila.Remove(item);
                     
                        break;
                    }
                    else if (item is Verdura)
                    {
                        verduras--;
                        vida += 10;
                        mochila.Remove(item);
                      
                        break;
                    }
                }Console.WriteLine("Te has comido una fruta/verdura y has aumentado 100/10 puntos de vida");
            }
            else
            {
                Console.WriteLine("No tienes suficiente fruta ni verdura para comer.");
            }


        }

        public static void VerMochila()
        {
        Console.WriteLine($"Hay {frutas} frutas y {verduras} verduras en la mochila.");
        }


 
    }
}

 