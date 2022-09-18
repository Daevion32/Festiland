@extends('layouts.app')

@section('content')
<main>
<div id="cardSection">
  @foreach ($eventsFut as $event)

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src=" {{ $event->image}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title" id="eventName">{{ $event->name}}</h5>
          <p class="card-text" id="eventDate">{{ $event->date}}</p>
          <p class="card-text" id="eventDate">{{ $event->description}}</p>
          <p class="card-text"><small class="text-muted">{{ $event->location}}</small></p>
          <p class="card-text" id="eventDate">{{ $event-> spaces}}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</main>
@endsection
