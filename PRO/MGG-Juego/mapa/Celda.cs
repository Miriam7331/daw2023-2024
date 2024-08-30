using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Celda
    {
       
        public Terreno terreno;

        public Celda() {
            
            terreno= Terreno.Muro;    
        }

      public  void Dibuja()
        {
            switch (terreno) 
            {
        
                case Terreno.Muro:
                    Console.Write("█");
                    break;
                case Terreno.Suelo:
                    Console.Write(" ");
                     break;
                case Terreno.Chuches:
                    Console.ForegroundColor = ConsoleColor.DarkYellow;
                    Console.Write("#");
                    Console.ResetColor();
                    break;
                case Terreno.Meta:
                    Console.ForegroundColor = ConsoleColor.Blue;
                    Console.Write("F"); 
                    Console.ResetColor();
                    break;
                case Terreno.Dinero:
                    Console.ForegroundColor = ConsoleColor.DarkYellow;
                    Console.Write("$");
                    Console.ResetColor();
                    break;
                case Terreno.Salida:
                    Console.ForegroundColor = ConsoleColor.Cyan;
                    Console.Write("X");
                    Console.ResetColor();
                    break;
                case Terreno.Fruta:
                    Console.ForegroundColor = ConsoleColor.Yellow; 
                    Console.Write("o");
                    Console.ResetColor(); 
                    break;
                case Terreno.Verdura:
                    Console.ForegroundColor = ConsoleColor.Green; 
                    Console.Write("o");
                    Console.ResetColor(); 
                    break;
            }
           
        }

    }
}