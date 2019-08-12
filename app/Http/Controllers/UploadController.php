<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Auth;
use Image;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    public function getUpload()
    {

        return view("upload");
    }
    public function postUpload(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('picture');
        $filename = uniqid($user->id . "_") . "." . $file->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($file));
        //update the user record with new image filename
        $user->profile_pic = $filename;
        $user->save();
        //create thumbnail and save
        $thumb = Image::make($file);
        $thumb->fit(200);
        $jpg = (string) $thumb->encode('jpg');
        $thumbName = pathinfo($filename, PATHINFO_FILENAME) . '-thumb.jpg';
        Storage::disk('public')->put($thumbName, $jpg, 'public');
        return redirect('/');
    }
}
