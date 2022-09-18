@extends('layouts.app')

@section('content')

<div class="container_show">

    <div class="card mb-3 card text-bg-dark mb-3 card_show">
        <img src="{{ $event->image}}" class="card-img-top img_cardShow" alt="...">
        <div class="card border-dark card_textshow">
            <p class="card-text">{{ $event->date}}</p>

             <div class="container_spaces">
             <h5 class="card-title">Description</h5>
             <button class="h-10 px-6 font-semibold rounded-md bg-red text-white button_space" type="submit"> {{ $event-> spaces}} pax</button>

             </div>
         


            <p class="card-text">{{ $event->description}}</p>
            <div class="buttons_cardShow">

                <a href="{{ route('cancelInscription', $event->id)}}"class="btn btn-warning">Check Out</a>
                <a href="{{ route('inscribe', $event->id)}}" class="btn btn-warning">Check Inn</a>
                <!-- <a href="{{ route('cancelInscription', $event->id)}}"class="btn btn-warning" onclick="return confirm ('Acabas de desinscribirte en el evento {{$event->name}}')">❌</a>
                    <a href="{{ route('inscribe', $event->id)}}" class="btn btn-warning" onclick="return confirm ('Acabas de inscribirte en el evento {{$event->name}}')">✔️</a> -->

            </div>
            <a href="{{ url('/') }}" class="btn btn-warning btn_home">Home</a>
    </div>
        </div>
       
</div>





























@endsection