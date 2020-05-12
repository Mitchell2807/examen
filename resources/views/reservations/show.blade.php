<!-- Showpagina van de reserveringen -->
<!-- @can voor permissies -->
@extends('layout.layout')

@section('content')

<br>
    <h1 class="mt-5">Reservering</h1>
<!-- Navigatie -->
    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.index') }}">Index</a>
            </li>

            <li  class="nav-item">
            <a class="nav-link" href="{{ route('reservations.create') }}">Maken</a>
            </li>

            <li  class="nav-item">
            <a class="nav-link active" href="{{ route('reservations.show',
                                    ['reservation' => $reservation->id]) }}">ReserveringsDetails</a>
            </li>

        </ul>
    </nav>
<!-- details -->
    <div class="card">
  <div class="card-header">
  ReserveringsDetails
  </div>
  <div class="card-body">
    <h2 class="card-title">{{ $reservation->user->name }}</h2>
    <p class="card-title"><strong>Filmnaam:</strong></p>
    <p class="card-text">{{ $reservation->movie->moviename }}</p>
    <p class="card-title"><strong>Tijd:</strong></p>
    <p class="card-text">{{ $reservation->begin }}</p>
    <p class="card-title"><strong>Aantal tickets:</strong></p>
    <p class="card-text">{{ $reservation->amount }}</p>
    <p class="card-title"><strong>Prijs per ticket:</strong></p>
    <p class="card-text">€{{ $reservation->movie->price }}</p>
    <p class="card-title"><strong>Totaalprijs:</strong></p>
    <p class="card-text">€{{$reservation->movie->price*$reservation->quantity }}</p>
  </div>
</div>
