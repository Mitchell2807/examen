@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Films</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<!-- Navigatie -->
    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('movies.index') }}">Overzicht</a>
            </li>
        </ul>
    </nav>

    <!-- Tabel -->
    <table class="table .table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Filmnaam</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Prijs</th>
    </tr>
    </thead>
    <tbody>

@foreach($movies as $movie)
            <tr>
                <td scope="row">{{ $movie->id }}</td>
                <td scope="row">{{ $movie->movieName }}</td>
                <td scope="row">{{ $movie->description }}</td>
                <td scope="row">€{{ $movie->price }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endsection
