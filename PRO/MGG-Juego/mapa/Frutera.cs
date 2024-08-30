using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Frutera : NPC
    {
        public int x { get; set; } 
        public int y { get; set; } 
        public Mapa mapa { get; set; } 

        public void CreaNPC(int x, int y, Mapa elmapa) 
        {
            this.x = x;
            this.y = y;
            mapa = elmapa;
        }

        public Frutera(int x, int y, Mapa elmapa)
        {
            this.x = x;
            this.y = y;
            this.mapa = mapa;
      
        }

        public void Dibuja() 
        {
            Console.ForegroundColor = ConsoleColor.White;
            Console.SetCursorPosition(x, y);
            Console.Write('%');
            Console.ResetColor();
        }


   

        public void Interactuar(Jugador jugador)
        {
            
            double distancia = Math.Sqrt(Math.Pow(jugador.x - x, 2) + Math.Pow(jugador.y - y, 2));

            if (distancia <= 2) 
            {
                LeerFrase();
            }
        }


        private void LeerFrase()
        {
            
            try
            {
                using (StreamReader archivo = new StreamReader("frutera.txt"))
                {
                    string[] lineas = archivo.ReadToEnd().Split('\n');
                    Random rnd = new Random();
                    int indice = rnd.Next(0, lineas.Length);                  
                    Console.WriteLine(lineas[indice]);
                    archivo.Close();
                }
            }
            catch (FileNotFoundException)
            {
                Console.WriteLine("Archivo frutera.txt no encontrado.");
            }
        }
    }
}