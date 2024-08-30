using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public class Chuche : IFrutaVerdura
    {
        public string Nombre { get { return "Chuche"; } }
        public ConsoleColor Color { get { return ConsoleColor.DarkYellow; } }

        public void Dibujar()
        {
            Console.ForegroundColor = Color;
            Console.Write("#");
        }
        public void Recoger(List<IFrutaVerdura> mochila)
        {
            mochila.Add(this);
        }
    }
}