<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;
use Illuminate\Validation\ValidationException;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $playlists = $user->playlists()->with('tracks')->get();
        
        return Inertia::render('Playlist/Index', [
            'playlists' => $playlists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::where('display', true)->orderBy('title')->get();
        return Inertia::render('Playlist/Create', [
            'tracks' => $tracks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tracks' => ['required', 'array'],
            // 'tracks.*' => ['required', 'string', 'exists:tracks,uuid']
            'tracks.*' => ['required', 'string']
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->where('display', true)->get();
        if($tracks->count() !== count($request->tracks)){
            throw ValidationException::withMessages(['tracks' => 'invalid track in array']);
        }

        $playlist = Playlist::create([
            "uuid" => "ply". Str::uuid(),
            "user_id" => $request->user()->id,
            "title" => $request->title,
        ]);

        $playlist->tracks()->attach($tracks->pluck('id'));

        return redirect()->route('playlists.index');
    }
    public function destroy(Playlist $playlist)
    {
        //
    }
    public function show(Playlist $playlist)
    {
        return Inertia::render('Playlist/Show', [
            'playlist'=> $playlist->load('tracks'),
        ]);
    }
}