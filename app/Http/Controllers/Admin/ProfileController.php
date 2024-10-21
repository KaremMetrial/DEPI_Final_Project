<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUploadTrait;
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'avatar');
        $this->user->update([
            'name' => $request->input('name'),
            'avatar' => $imagePath ?? $this->user->avatar,
            'email' => $request->input('email'),
        ]);

        toastr('Updated Profile Successfully', 'success');
        return redirect()->back();
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        if (Hash::check($request->input('current_password'), $this->user->password)) {

            $this->user->update([
                'password' => bcrypt($request->input('password')), // Hash the new password
            ]);

            toastr('Updated Password Successfully', 'success');

        } else {

            toastr('Current password is incorrect.', 'error');

        }

        return redirect()->back();
    }
}
