@extends('layout.layout')

@section('content')
@can('create movies')
    <h1 class="mt-5">Movies</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('movies.index') }}">Index</a>
            </li>

            <li  class="nav-item">
            <a class="nav-link active" href="{{ route('movies.create') }}">Maken</a>
            </li>


        </ul>
    </nav>

    <form method="POST" action="/movies">

    @csrf

    <div class="form-group">
        <label for="movieName">Filmnaam</label>
        <input type="text" name="movieName" class=form-control id="movieName"
            aria-describedby="movieNameHelp" placeholder="Voer filmnaam in...">
    </div>

    <div class="form-group">
        <label for="description">Beschrijving</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="price">Prijs</label>
        <input type="text" name="price" class=form-control id="price"
            aria-describedby="priceHelp" placeholder="Voer prijs in...">
    </div>

    <button type="submit" class="btn btn-primary">Gereed</button>

    </form>
@endcan
@endsection
