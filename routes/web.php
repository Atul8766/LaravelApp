<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WhatsappController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;

Route::get('/', fn() => redirect('/pokemon/1'));

Route::get('/pokemon', function () {
    $search = request('search');
    if (!$search) return redirect('/pokemon/1');
    return redirect("/pokemon/{$search}");
});

Route::get('/pokemon/{id}', function ($id) {
    $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$id}");
    // dd($response->json());
    if ($response->failed()) {
        return back()->withErrors(['Pokémon not found.']);
    }

    $pokemon = $response->json();
    return view('pokemon', compact('pokemon'));
});
