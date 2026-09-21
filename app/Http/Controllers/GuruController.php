<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(): View
    {
        $gurus = Guru::orderBy('urutan')->get();

        return view('guru', compact('gurus'));
    }
}