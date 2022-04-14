<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * @param UploadedFile $file
     * @return string
     * @throws Exception
     */
    public function uploadFile(UploadedFile $file, string $path): string
    {
        $completedFile = $file->storeAs($path, $file->hashName(), 'public');
        if (!$completedFile) {
            throw new Exception("File wasn't upload");
        }

        return $completedFile;
    }
}
