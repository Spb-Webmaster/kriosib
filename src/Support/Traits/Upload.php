<?php

namespace Support\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Upload
{
    public function UploadFile(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $FileName = !is_null($filename) ? $filename : Str::random(10) . "." . $file->getClientOriginalExtension();
        return $file->storeAs(
            $folder,
            $FileName,
            $disk
        );
    }

    public function deleteFile($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }

    public function deleteFiles($path, $disk = 'public')
    {
        if (Storage::disk($disk)->directoryExists($path)) {

            $folderPath = public_path('storage/' . $path);

            File::deleteDirectory($folderPath);


        }


    }
}
