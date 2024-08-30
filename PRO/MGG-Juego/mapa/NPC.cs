using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mapa
{
    public interface NPC
    {

        int x { get; set; } 
        int y { get; set; } 
        Mapa mapa { get; set; } 

        void CreaNPC(int x, int y, Mapa elmapa); 

        void Dibuja();

   
    }
}