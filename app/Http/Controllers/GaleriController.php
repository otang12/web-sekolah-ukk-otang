<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(): View
    {
        $photos = Galeri::orderBy('urutan')->get();

        return view('galeri', compact('photos'));
    }
}