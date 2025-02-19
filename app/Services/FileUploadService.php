<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public static function upload($file, $filePath)
    {
        Storage::disk('public')->move($file, $filePath);
        return $filePath;
    }

    public static function removeIfExists($filePath): void
    {
        if ($filePath != null && Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}
