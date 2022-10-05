<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function import(Request $request)
    {
        dd(json_decode(file_get_contents($request->patient->path())));
    }
}
