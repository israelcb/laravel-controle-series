<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = array(
            'Punisher',
            'Lost',
            'Grey\'s Anatomy',
        );

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>{$serie}</li>";
        }

        echo $html;
    }
}
