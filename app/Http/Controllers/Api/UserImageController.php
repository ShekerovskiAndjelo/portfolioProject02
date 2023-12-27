<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserImage;
use Illuminate\Http\Request;

class UserImageController extends Controller
{
    public function index()
    {
        $userImages = UserImage::all();
        return response()->json(['userImages' => $userImages]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required',
            'image_url' => 'required|url',
        ]);

        $userImage = UserImage::create($validatedData);
        return response()->json(['userImage' => $userImage], 201);
    }

    public function show($id)
    {
        $userImage = UserImage::findOrFail($id);
        return response()->json(['userImage' => $userImage]);
    }
}

