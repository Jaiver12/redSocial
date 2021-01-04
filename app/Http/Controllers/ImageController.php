<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'image_path'=> 'image',
            'description' => 'required|string|max:255',
        ]);

        $image_url = $request->file('image_path')->store('public/image');
        $image_path = Storage::url($image_url);

        $description = $request->input('description');

        $user = Auth::user();

        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = $image_path;
        $image->description = $description;

        $image->save();

        return redirect()->route('image.create')->with(['message' => 'Imagen subida correctamente']);

    }

    public function detail($id)
    {
        $image = Image::find($id);

        return view('image.detail', ['image' => $image]);
    }
}
