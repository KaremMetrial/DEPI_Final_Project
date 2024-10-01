<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Web\ProfilePasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Hash;
use App\Traits\FileUploadTrait;
class ProfileController extends Controller
{
    use FileUploadTrait;
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();
        if(Auth::user()->wasChanged()){
         toastr('updated profile successfully', 'success');
        }
        return redirect()->back();
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        if (Hash::check($request->input('current_password'),Auth::user()->password)) {
            Auth::user()->update($request->validated());
            toastr('Updated Password Successfully', 'success');
        }else {
            toastr('Current password is incorrect.', 'error');
        }
        return redirect()->back();
    }
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048', // Adjust as necessary
        ]);

        $imagePath = $this->uploadImage($request, 'avatar');
        if (!$imagePath) {
            return response()->json(['status' => 'error', 'message' => 'Failed to upload image'], 400);
        }
        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();

        return response()->json(['status' => 'success', 'avatar' => asset($imagePath)]);
    }

}
