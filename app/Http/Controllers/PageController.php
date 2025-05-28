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
        return view('cosa-fare');
    }

    public function contatti()
    {
        return view('contatti');
    }

    public function prenota()
    {
        return view('prenota');
    }
}
