<?php

namespace App\Traits;

use Illuminate\Http\Request;
trait FileUploadTrait
{

    public function uploadImage(Request $request, $inputName, $path = 'uploads/')
    {
        $storagePath = public_path($path);

        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Move the file to the storage path
            $image->move($storagePath, $imageName);

            return $path . $imageName;
        }
        return null;
    }
}
