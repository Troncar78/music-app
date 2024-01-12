<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function index(){

        $user = request()->user();
        $apikeys = Apikey::where("user_id", $user->id)->orderBy('name')->get();
        return Inertia::render('ApiKey/Index', [
            'apikeys' => $apikeys,
        ]);
    }
    
    public function create(){
        return Inertia::render('ApiKey/Create');

    }
    public function store(Request $request){
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);

        $uuid = 'key-'. Str::uuid();
        $key = 'key-'. Str::random(26);

        ApiKey::create([
            'uuid'=> $uuid,
            'user_id' => $request->user()->id,
            'name'=> $request->name,
            'key' => $key,
        ]);

        return redirect()->route('apikeys.index');
    }

    public function destroy (ApiKey $apikey){
        $apikey->delete();
        return redirect()->route('apikeys.index');
    }
}
