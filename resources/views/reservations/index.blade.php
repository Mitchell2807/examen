@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reserveringen</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reservations.index') }}">Overzicht</a>
            </li>

            <li  class="nav-item">
            <a class="nav-link" href="{{ route('reservations.create') }}">Maken</a>
            </li>


        </ul>
    </nav>
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
        <th scope="col">Bewerken</th>
        <th scope="col">Verwijderen</th>

    </tr>
    </thead>
    <tbody>


@foreach($reservations as $reservation)

            <tr>
                <td scope="row">{{ $reservation->id }}</td>
                <td scope="row">{{ $reservation->user->name }}</td>
                <td scope="row">{{ $reservation->movie->movieName }}</td>
                <td scope="row">{{ $reservation->time }}</td>
                <td scope="row">{{$reservation->quantity }}</td>
                <td scope="row">€{{$reservation->movie->price*$reservation->quantity }}</td>

                <td><a href="{{ route('reservations.show',
                    ['reservation' => $reservation->id]) }}">Details</a></td>


                <td><a href="{{ route('reservations.edit',
                    ['reservation' => $reservation->id]) }}">Bewerken</a></td>

                    <td><a href="{{ route('reservations.delete',
                    ['reservation' => $reservation->id]) }}">Verwijderen</a></td>

            </tr>


@endforeach


    </tbody>
    </table>
    @endsection
