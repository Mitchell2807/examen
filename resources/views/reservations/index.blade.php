@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reserveringen</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<!-- Navigatie -->
    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reservations.index') }}">Overzicht</a>
            </li>
            @can('create reservations')
            <li  class="nav-item">
            <a class="nav-link" href="{{ route('reservations.create') }}">Maken</a>
            </li>
@endcan

        </ul>
    </nav>

    <!-- Tabel -->
    <table class="table .table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Gebruikersnaam</th>
        <th scope="col">Filmnaam</th>
        <th scope="col">Tijd</th>
        <th scope="col">Aantal</th>
        <th scope="col">Totaalprijs</th>
        <th scope="col">Details</th>
        @can('edit reservations')
        <th scope="col">Bewerken</th>
        @endcan
        @can('delete reservations')
        <th scope="col">Verwijderen</th>
        @endcan

    </tr>
    </thead>
    <tbody>


@foreach($reservations as $reservation)
@auth
    @if(Auth::user()-> id == $reservation->user->id or Auth::user()->getRoleNames() == '["admin"]')

            <tr>
                <td scope="row">{{ $reservation->id }}</td>
                <td scope="row">{{ $reservation->user->name }}</td>
                <td scope="row">{{ $reservation->movie->movieName }}</td>
                <td scope="row">{{ $reservation->time }}</td>
                <td scope="row">{{$reservation->quantity }}</td>
                <td scope="row">€{{$reservation->movie->price*$reservation->quantity }}</td>

                <td><a href="{{ route('reservations.show',
                    ['reservation' => $reservation->id]) }}">Details</a></td>

                    @can('edit reservations')
                <td><a href="{{ route('reservations.edit',
                    ['reservation' => $reservation->id]) }}">Bewerken</a></td>
                    @endcan
                    @can('delete reservations')
                    <td><a href="{{ route('reservations.delete',
                    ['reservation' => $reservation->id]) }}">Verwijderen</a></td>
                    @endcan

            </tr>
            @endif
            @endauth
        @endforeach

    </tbody>
    </table>
    @endsection
