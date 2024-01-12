<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use App\Models\Playlist;
use Illuminate\Http\Request;

class UserPlaylistController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user;

        $playlists = Playlist::where('user_id', $user->id)->get();

        return response()->json($playlists);
    }
}
