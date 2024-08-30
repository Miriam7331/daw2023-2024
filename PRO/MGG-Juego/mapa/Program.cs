using mapa;
using System.Numerics;
ConsoleKey tecla = Menu.Opciones();
Mapa mapa;
Jugador player;
Madre madre;
Padre padre;
Nutricionista nutricionista;
Curandero curandero;
Maga maga;
Druida druida;
Frutera frutera;
Verdurero verdurero;

if (tecla == ConsoleKey.D3 || tecla == ConsoleKey.NumPad3)
{
    mapa = new Mapa(60, 20);
    player = new Jugador(30, 10, mapa);
    madre = new Madre(0, 0, mapa, player);
    padre = new Padre(0, 0, mapa, player);
    nutricionista = new Nutricionista(0, 0, mapa, player);
    druida = new Druida(0, 0, mapa, player);
    maga = new Maga(0, 0, mapa, player);
    curandero = new Curandero(0, 0, mapa, player);
    frutera = new Frutera(0 ,0,mapa);
    verdurero = new Verdurero(0, 0, mapa);

    while (true)
    {
        Pantallazo.EjecutarJuego();
        Console.ReadKey(true);
    }



    /* string directorioActual = Environment.CurrentDirectory;
     Console.WriteLine("El directorio actual es: " + directorioActual);*/

}