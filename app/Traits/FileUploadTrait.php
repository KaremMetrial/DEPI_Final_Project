<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{

    public function uploadImage(Request $request, $inputName, $oldPath = null, $path = 'uploads/')
    {

        if ($request->hasFile($inputName)) {
            $storagePath = public_path($path);

            $image = $request->file($inputName);
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Move the file to the storage path
            $image->move($storagePath, $imageName);

            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            return $path . $imageName;
        }
        return null;
    }
}
