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

    <nav class="nav">
        <ul class="nav nav-tabs">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.index') }}">Overzicht</a>
            </li>


            <li  class="nav-item">
            <a class="nav-link active" href="{{ route('reservations.create') }}">Maken</a>
            </li>


        </ul>
    </nav>


    <form method="POST" action="/reservations">

    @csrf

    <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" value="{{Auth::user()->name}}" name="name" class = "form-control"
                                id = "name" disabled = "disabled">
    </div>

    <div class="form-group">
        <label for="movie_id">Filmnaam</label>
        <select id="movie_id" name = "movie_id" class = "form-control">
        @foreach($movies as $id => $movie)
        <option id="movie" value="{{$id}}">{{$movie}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="begin">Tijd</label>
        <input type="datetime-local" name="price" class=form-control id="begin"
            aria-describedby="beginHelp" placeholder="" disabled="disabled">
    </div>

    <div class="form-group">
        <label for="amount">Aantal tickets</label>
        <select class="form-control" name="amount" id="amount" rows="3">
        <option id="amount" value="1">1</option>
        <option id="amount" value="2">2</option>
        <option id="amount" value="3">3</option>
        <option id="amount" value="4">4</option>
        <option id="amount" value="5">5</option>
        <option id="amount" value="6">6</option>
        <option id="amount" value="7">7</option>
        <option id="amount" value="8">8</option>
        <option id="amount" value="9">9</option>
        <option id="amount" value="10">10</option>
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Gereed</button>

    </form>

@endsection
