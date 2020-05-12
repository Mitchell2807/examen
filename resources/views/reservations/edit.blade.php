
@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reservations</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<!-- Navigatie -->
    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.index') }}">Index</a>
            </li>

            @can('create reservations')
            <li  class="nav-item">
            <a class="nav-link" href="{{ route('reservations.create') }}">Maken</a>
            </li>
            @endcan
            @can('edit reservations')
            <li  class="nav-item">
            <a class="nav-link active" href="{{ route('reservations.edit',
                                        ['reservation' => $reservation->id]) }}">Bewerken</a>
            </li>

        </ul>
    </nav>

<!-- Formulier -->
    <form method="POST" action="/reservations/{{$reservation->id}}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" class=form-control id="username"
                aria-describedby="usernameHelp" value="{{$reservation->user->name}}" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="movie_id">Film</label>
            <select id="movie_id" name = "movie_id" class = "form-control">
            @foreach($movies as $id => $movie)
            <option id="movie" value="{{$id}}">{{$movie}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="quantity">Aantal tickets</label>
        <select class="form-control" name="quantity" id="quantity" rows="3">
        <option id="quantity" value="1">{{$reservation->quantity}}</option>
        <option id="quantity" value="1">1</option>
        <option id="quantity" value="2">2</option>
        <option id="quantity" value="3">3</option>
        <option id="quantity" value="4">4</option>
        <option id="quantity" value="5">5</option>
        <option id="quantity" value="6">6</option>
        <option id="quantity" value="7">7</option>
        <option id="quantity" value="8">8</option>
        <option id="quantity" value="9">9</option>
        <option id="quantity" value="10">10</option>
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Updaten</button>

    </form>
@endif
@endsection
