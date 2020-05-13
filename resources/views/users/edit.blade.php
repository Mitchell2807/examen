
@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Mijn gegevens</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<!-- Formulier -->
    <form method="POST" action="/users/{{Auth::user()->id}}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="name">Gebruikersnaam</label>
            <input type="text" name="name" class=form-control id="name"
                aria-describedby="nameHelp" value="{{Auth::user()->name}}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class=form-control id="email"
                aria-describedby="emailHelp" value="{{Auth::user()->email}}">
        </div>

        <div class="form-group">
            <label for="phone">Telefoon</label>
            <input type="text" name="phone" class=form-control id="phone"
                aria-describedby="phoneHelp" value="{{Auth::user()->phone}}">
        </div>

        <button type="submit" class="btn btn-primary">Updaten</button>

    </form>
@endsection
