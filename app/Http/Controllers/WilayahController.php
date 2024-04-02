<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    function index()
    {
        $provinces = Province::all(["id", "name"]);
        $regencies = Regency::where(["province_id", "name"]);
        $districts = District::all();
        $villages = Village::all();
        return view('form', compact('provinces', 'regencies', 'districts', 'villages'));
    }
}