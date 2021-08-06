<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    /**
     * @param $image
     * @param $name
     * @param null $oldName
     */
    public static function profile($image, $name, $oldName = null): void
    {
        if ($oldName) {
            Storage::delete('public/ktp/' . $oldName);
        }
        Storage::putFileAs("public/ktp", $image, $name);
    }

    public static function karir($image, $name, $oldName = null): void
    {
        if ($oldName) {
            Storage::delete('public/ktp/' . $oldName);
        }
        Storage::putFileAs("public/ktp", $image, $name);
    }

    public static function slide($image, $name, $oldName = null): void
    {
        if ($oldName) {
            Storage::delete('public/slide/' . $oldName);
        }
        Storage::putFileAs("public/slide", $image, $name);
    }

    public static function berita($image, $name, $oldName = null): void
    {
        if ($oldName) {
            Storage::delete('public/berita/' . $oldName);
        }
        Storage::putFileAs("public/berita", $image, $name);
    }

    public static function lowongan($image, $name, $oldName = null): void
    {
        if ($oldName) {
            Storage::delete('public/lowongan/' . $oldName);
        }
        Storage::putFileAs("public/lowongan", $image, $name);
    }
}
