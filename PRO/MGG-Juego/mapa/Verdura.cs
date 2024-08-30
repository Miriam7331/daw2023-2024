using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Verdura : IFrutaVerdura
    {
        public string Nombre { get { return "Verdura"; } } 
        public ConsoleColor Color { get { return ConsoleColor.Green; } }

        public void Dibujar()
        {
            Console.ForegroundColor = Color;
            Console.Write("o");
        }



        public void Recoger(List<IFrutaVerdura> mochila)
        {
            mochila.Add(this);
        }
    }
}