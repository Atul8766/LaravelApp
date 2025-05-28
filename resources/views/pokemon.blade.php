@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Error Message --}}
    @if($errors->any())
    <div class="alert alert-danger text-center">
        {{ $errors->first() }}
    </div>
    @endif

    {{-- Search Form --}}
    <form method="GET" action="/pokemon" class="mb-4">
        <div class="input-group w-50 mx-auto">
            <input type="text" name="search" class="form-control" placeholder="Enter Pokémon name or ID" required>
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    {{-- Pokémon Card --}}
    <div class="card shadow-sm p-4 text-center">
        <h2 class="mb-3">{{ ucfirst($pokemon['name']) }} (#{{ $pokemon['id'] }})</h2>
        <img src="{{ $pokemon['sprites']['front_default'] }}" alt="{{ $pokemon['name'] }}" class="mb-3" style="width: 150px;">

        <h5 class="text-muted">Type(s):</h5>
        <div class="d-flex justify-content-center gap-2 mb-4">
            @foreach($pokemon['types'] as $type)
            <span class="badge bg-primary text-capitalize">{{ $type['type']['name'] }}</span>
            @endforeach
        </div>

        <h5 class="text-muted">Stats:</h5>
        <ul class="list-group list-group-flush mb-4">
            @foreach($pokemon['stats'] as $stat)
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-capitalize">{{ $stat['stat']['name'] }}</span>
                <span>{{ $stat['base_stat'] }}</span>
            </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-between">
            <a href="/pokemon/{{ $pokemon['id'] > 1 ? $pokemon['id'] - 1 : 1 }}" class="btn btn-outline-secondary">&laquo; Previous</a>
            <a href="/pokemon/{{ $pokemon['id'] + 1 }}" class="btn btn-outline-primary">Next &raquo;</a>
        </div>
    </div>
</div>
@endsection