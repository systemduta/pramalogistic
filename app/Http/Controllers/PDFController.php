<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public static function pdf($image, $name): void
    {
        Storage::putFileAs("public/PDF", $image, $name);
    }
}
