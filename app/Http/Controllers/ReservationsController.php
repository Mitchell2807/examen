<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationsStoreRequest;
use App\Http\Requests\ReservationsUpdateRequest;
use App\Reservation;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //laten zien van de reserveringen en films.
        $reservations = Reservation::all();
        $movies = Movie::all();

        return view('reservations.index', compact('reservations','movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //het maken van een nieuwe reservering.
        $movies = Movie::pluck('moviename', 'id')->all();
        return view('reservations.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationsStoreRequest $request)
    {
        //nieuwe reservering maken
        $reservation = new Reservation();
        //attributen van de reservering meegeven
        $reservation->user_id = Auth::user()->id;
        $reservation->movie_id = $request->movie_id;
        $reservation->time = $request->time;
        $reservation->quantity = $request->quantity;
        //opslaan van nieuwe reservering in database
        $reservation->save();

        //terugkeren naar de reserveringen index met het bericht.
        return redirect()->route('reservations.index')->with('message', 'Reservering geplaatst');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //details bekijken van een reservering.
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //bewerken van een reservering
        $movies= Movie::pluck('moviename', 'id');
        return view('reservations.edit', compact('reservation', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationsUpdateRequest $request, Reservation $reservation)
    {
        //updaten van de database door middel van de edit methode
        $reservation->movie_id =$request->movie_id;
        $reservation->time = $request->time;
        $reservation->quantity = $request->quantity;

        $reservation->save();

        return redirect()->route('reservations.index')->with('message', 'Reservering geupdatet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function delete(Reservation $reservation)
    {
        //terugkeren naar de delete view.
        return view('reservations.delete', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        //verwijderen van een reservering.
        $reservation->delete();

        //terugkeren naar de index methode nadat een reservering is verwijderd.
        return redirect()->route('reservations.index')->with('message', 'reservering verwijderd');
    }
}
