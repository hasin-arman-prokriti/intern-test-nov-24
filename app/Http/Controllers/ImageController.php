<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    
    public function index()
{
    // getting the stored the images from db
    $images = Image::all();

    
    return view(view: 'upload', data: compact('images'));
}

    // Method to handle the image upload process
    public function upload(Request $request)
    {
        //checking if the file is image or not
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // assigning file type and size limit
        ]);

        // Store the file in the /public/images directory
        $path = $request->file('image')->store('images', 'public');

        // storing the path in database
        Image::create(['filepath' => $path]);

        return redirect('/')->with('success', 'Image uploaded successfully!');
    }
}
