<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function camere()
    {
        return view('camere.index');
    }

    public function pink()
    {
        return view('camere.pink');
    }

    public function green()
    {
        return view('camere.green');
    }

    public function grey()
    {
        return view('camere.grey');
    }

    public function cosaFare()
    {
        $luoghi = [
                [
                    'key' => 'santa_maria_maggiore',
                    'image' => 'santa-maria-maggiore.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nickcastelliphotography">Nick Castelli</a> su <a href="https://unsplash.com/it/foto/unauto-parcheggiata-davanti-a-un-grande-edificio-TQgKNmYmzyE">Unsplash</a>',
                ],
                [
                    'key' => 'colosseum',
                    'image' => 'colosseo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nicknight">Nick Night</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-sotto-il-cielo-bianco-durante-il-giorno-9tOrcg9tPyM">Unsplash</a>',
                ],
                [
                    'key' => 'fori_imperiali',
                    'image' => 'fori-imperiali.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@nathanstaz">Nathan Staz</a> su <a href="https://unsplash.com/it/foto/le-rovine-dellantica-citta-di-roma-Vlh2VWXvrOc">Unsplash</a>',
                ],
                [
                    'key' => 'trevi_fountain',
                    'image' => 'fontana-di-trevi.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@ansharimages">Andrey Omelyanchuk</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-bianco-con-fontana-dacqua-VcWIMPXiGlU">Unsplash</a>',
                ],
                [
                    'key' => 'altare_patria',
                    'image' => 'altare-della-patria.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@yayamomt">Yahya Momtaz</a> su <a href="https://unsplash.com/it/foto/un-grande-edificio-bianco-con-una-statua-sopra-di-esso-bqxpi2Yj83Y">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_spagna',
                    'image' => 'piazza-di-spagna.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@shaipal">Shai Pal</a> su <a href="https://unsplash.com/it/foto/una-fontana-con-una-torre-dellorologio-sullo-sfondo-3rbqwaYnf4w">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_popolo',
                    'image' => 'piazza-del-popolo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@dmitrytomashek">Dmitry Tomashek</a> su <a href="https://unsplash.com/it/foto/un-gruppo-di-persone-che-camminano-intorno-a-una-piazza-della-citta-wuR8iRd4RBI">Unsplash</a>',
                ],
                [
                    'key' => 'piazza_navona',
                    'image' => 'piazza-navona.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@fmoladavis">Fernando Mola-Davis</a> su <a href="https://unsplash.com/it/foto/un-canale-con-edifici-lungo-di-esso-con-piazza-navona-sullo-sfondo-y6nWuocbW4w">Unsplash</a>',
                ],
                [
                    'key' => 'castel_santangelo',
                    'image' => 'castel-santangelo.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@michelebit_">Michele Bitetto</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-Nv0gYSW1Th8">Unsplash</a>',
                ],
                [
                    'key' => 'san_pietro',
                    'image' => 'san-pietro.jpg',
                    'credit' =>
                        'Foto di <a href="https://unsplash.com/it/@deviousmike">Michał Kostrzyński</a> su <a href="https://unsplash.com/it/foto/edificio-in-cemento-marrone-e-bianco-sotto-nuvole-bianche-durante-il-giorno-pPW7xe6v4eE">Unsplash</a>',
                ],
            ];
        return view('cosa-fare', compact('luoghi'));
    }

    public function contatti()
    {
        return view('contatti');
    }

    public function prenota()
    {
        return view('prenota');
    }

    public function bio(){
        
        return view('bio');
    }
}
