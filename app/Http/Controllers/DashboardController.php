<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $photo_count = Photo::count();
        $album_count = Album::count();
        return view('dashboard.index', compact(
            'user_count',
            'photo_count',
            'album_count'
        ));
    }

    public function photos(Request $request) {
        $search = $request->search;
        $photos = Photo::all();

        return view('dashboard.photos', compact('photos', 'search'));
    }

    public function albums() {
        $albums = Album::all();
        return view('dashboard.albums', compact('albums'));
    }
}
