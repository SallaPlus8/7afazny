<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

trait UploadeImages
{
    /**
     * Handle a single image upload.
     *
     * @param UploadedFile|null $image
     * @param string $path
     * @return string|null
     */
    public function uploadSingleImage(?UploadedFile $image, $path): ?string
    {
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $imageName);
            return $imageName;
        }
        return null;
    }

    /**
     * Delete an image from the server.
     *
     * @param string $path
     * @return bool
     */
    public function deleteImage($path)
    {
        $fullPath = public_path($path);
        if (file_exists($fullPath)) {
            if (unlink($fullPath)) {
                return true;
            } else {
                Log::error('Failed to delete the image: ' . $fullPath);
                return false;
            }
        } else {
            Log::warning('Image file not found: ' . $fullPath);
            return false;
        }
    }
}
