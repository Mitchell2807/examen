
@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reserveringen</h1>

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
            @can('delete reservations')

            <li  class="nav-item">
            <a class="nav-link active" href="{{ route('reservations.delete',
                                        ['reservation' => $reservation->id]) }}">Verwijderen</a>
            </li>
            @endcan
        </ul>
    </nav>
    @can('delete reservations')
    <form method="POST" action="/reservations/{{$reservation->id}}">
        @method('DELETE')
        @csrf

        <!-- Formulier -->
        <div class="form-group">
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" class=form-control id="username"
                aria-describedby="usernameHelp" value="{{$reservation->user->name}}" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="movieName">Film</label>
            <input type="text" name="movieName" class=form-control id="movieName"
                aria-describedby="movieNameHelp" value="{{$reservation->movie->movieName}}" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="time">Tijd</label>
            <input type="text" name="time" class=form-control id="time"
                aria-describedby="timeHelp" value="{{$reservation->time}}" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="quantity">Aantal tickets</label>
            <select class="form-control" name="quantity" id="quantity" rows="3" disabled="disabled">
            <option id="quantity">{{ $reservation->quantity }}</option>
            </select>
        </div>

        <div class="form-group">
        <label for="price">Prijs per ticket</label>
        <input type="text" name="price" class=form-control id="price"
            aria-describedby="PriceHelp" placeholder="" disabled="disabled" value="€{{$reservation->movie->price }}">
    </div>

        <div class="form-group">
        <label for="total">Totaalprijs</label>
        <input type="text" name="total" class=form-control id="total"
            aria-describedby="TotalHelp" placeholder="" disabled="disabled" value="€{{$reservation->movie->price*$reservation->quantity }}">
    </div>


        <button type="submit" class="btn btn-primary">Delete</button>

    </form>
    @endcan
@endsection
