using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public interface IFrutaVerdura
    {
        string Nombre { get; } 

        ConsoleColor Color { get; }
        void Dibujar();
     
        void Recoger(List<IFrutaVerdura> mochila);




    }
}