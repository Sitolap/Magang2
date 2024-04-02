<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagangController extends Controller
{
    public function index()
    {
        return view('kategori');
    }
}