@extends('layouts.app')

@section('content')
<main>

<div class="sliderTitle">
<H2>EVENTOS DESTACADOS</H2>
</div>

<!-- CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" style="background-color: orange" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" style="background-color:orange" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" style="background-color:orange" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  @method('PATCH')
            @foreach ($eventsFut as $event)
    <div class="carousel-item active">
      <img src="{{ $event->image}}" class="d-block mx-auto" height="500vh" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $event->name}}</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ $event->image}}" class="d-block mx-auto" height="500vh" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $event->name}}</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ $event->image}}" class="d-block mx-auto" height="500vh" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $event->name}}</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    @endforeach

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- CARDS SECTION -->
<section id="cardSection">
  @foreach ($eventsFut as $event)

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src=" {{ $event->image}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="firstRow">
            <h5 class="card-title" id="eventName">{{ $event->name}}</h5>
            @if(Auth::check() && Auth::user()->isAdmin)
            <div class="adminButtons">
              <div id="editButton">
                <a id=“editButton” href="{{ route('editEvent', ['id' => $event->id]) }}">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.0066 3.12457L13.8754 4.99254M13.2083 1.47897L8.15505 6.53226C7.89395 6.79299 7.71588 7.12519 7.64328 7.48697L7.17651 9.82347L9.51301 9.35582C9.87478 9.28346 10.2065 9.10611 10.4677 8.84493L15.521 3.79164C15.6729 3.63979 15.7933 3.45951 15.8755 3.26111C15.9577 3.0627 16 2.85006 16 2.63531C16 2.42055 15.9577 2.20791 15.8755 2.0095C15.7933 1.8111 15.6729 1.63082 15.521 1.47897C15.3692 1.32712 15.1889 1.20666 14.9905 1.12448C14.7921 1.0423 14.5794 1 14.3647 1C14.1499 1 13.9373 1.0423 13.7389 1.12448C13.5405 1.20666 13.3602 1.32712 13.2083 1.47897V1.47897Z" stroke="#FF6400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M14.2354 11.5882V14.2353C14.2354 14.7033 14.0495 15.1522 13.7185 15.4831C13.3876 15.8141 12.9387 16 12.4707 16H2.76472C2.29669 16 1.84783 15.8141 1.51688 15.4831C1.18593 15.1522 1 14.7033 1 14.2353V4.52931C1 4.06128 1.18593 3.61241 1.51688 3.28146C1.84783 2.95051 2.29669 2.76459 2.76472 2.76459H5.41181" stroke="#FF6400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

                </a>
              </div>
              <div id="deleteButton">
                <form action="{{ route('delete',['id'=> $event->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <a type="button" onclick="return confirm ('¿Estás seguro de querer eliminar este Evento? {{$event->name}}')">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.75 2.75H10.25C10.25 2.41848 10.1183 2.10054 9.88388 1.86612C9.64946 1.6317 9.33152 1.5 9 1.5C8.66848 1.5 8.35054 1.6317 8.11612 1.86612C7.8817 2.10054 7.75 2.41848 7.75 2.75ZM6.5 2.75C6.5 2.08696 6.76339 1.45107 7.23223 0.982233C7.70107 0.513392 8.33696 0.25 9 0.25C9.66304 0.25 10.2989 0.513392 10.7678 0.982233C11.2366 1.45107 11.5 2.08696 11.5 2.75H16.5C16.6658 2.75 16.8247 2.81585 16.9419 2.93306C17.0592 3.05027 17.125 3.20924 17.125 3.375C17.125 3.54076 17.0592 3.69973 16.9419 3.81694C16.8247 3.93415 16.6658 4 16.5 4H15.795L14.2887 15.0475C14.1866 15.7962 13.8166 16.4825 13.2474 16.9793C12.6781 17.4762 11.9481 17.75 11.1925 17.75H6.8075C6.0519 17.75 5.32189 17.4762 4.75263 16.9793C4.18336 16.4825 3.81341 15.7962 3.71125 15.0475L2.205 4H1.5C1.33424 4 1.17527 3.93415 1.05806 3.81694C0.940848 3.69973 0.875 3.54076 0.875 3.375C0.875 3.20924 0.940848 3.05027 1.05806 2.93306C1.17527 2.81585 1.33424 2.75 1.5 2.75H6.5ZM7.75 7.125C7.75 6.95924 7.68415 6.80027 7.56694 6.68306C7.44973 6.56585 7.29076 6.5 7.125 6.5C6.95924 6.5 6.80027 6.56585 6.68306 6.68306C6.56585 6.80027 6.5 6.95924 6.5 7.125V13.375C6.5 13.5408 6.56585 13.6997 6.68306 13.8169C6.80027 13.9342 6.95924 14 7.125 14C7.29076 14 7.44973 13.9342 7.56694 13.8169C7.68415 13.6997 7.75 13.5408 7.75 13.375V7.125ZM10.875 6.5C10.7092 6.5 10.5503 6.56585 10.4331 6.68306C10.3158 6.80027 10.25 6.95924 10.25 7.125V13.375C10.25 13.5408 10.3158 13.6997 10.4331 13.8169C10.5503 13.9342 10.7092 14 10.875 14C11.0408 14 11.1997 13.9342 11.3169 13.8169C11.4342 13.6997 11.5 13.5408 11.5 13.375V7.125C11.5 6.95924 11.4342 6.80027 11.3169 6.68306C11.1997 6.56585 11.0408 6.5 10.875 6.5Z" fill="#FF6400"/>
                    </svg>

                    </a>
                </form>
              </div>
            </div>
            @endif
          </div>
          <div class="date">
          <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_15_320)">
              <path d="M12.75 2.66663H4.25002C2.68521 2.66663 1.41669 3.86053 1.41669 5.33329V12C1.41669 13.4727 2.68521 14.6666 4.25002 14.6666H12.75C14.3148 14.6666 15.5834 13.4727 15.5834 12V5.33329C15.5834 3.86053 14.3148 2.66663 12.75 2.66663Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M5.66669 1.33331V3.99998M11.3334 1.33331V3.99998M1.41669 6.66665H15.5834" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
              <clipPath id="clip0_15_320">
              <rect width="17" height="16" fill="white"/>
              </clipPath>
              </defs>
        </svg>

          <p class="card-text" id="eventDate">{{ $event->date}}</p>
          </div>
          <p class="card-text" id="eventDate">{{ $event->description}}</p>
          <div class="fourthRow">
            <div class="location">
              <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.50001 1.25C7.76844 1.25215 6.10838 1.97717 4.88397 3.26602C3.65957 4.55486 2.9708 6.3023 2.96876 8.125C2.96668 9.61452 3.4289 11.0636 4.28451 12.25C4.28451 12.25 4.46263 12.4969 4.49173 12.5325L9.50001 18.75L14.5107 12.5294C14.5368 12.4963 14.7155 12.25 14.7155 12.25L14.7161 12.2481C15.5713 11.0623 16.0333 9.61383 16.0313 8.125C16.0292 6.3023 15.3404 4.55486 14.116 3.26602C12.8916 1.97717 11.2316 1.25215 9.50001 1.25ZM9.50001 10.625C9.03028 10.625 8.57109 10.4784 8.18053 10.2037C7.78996 9.92897 7.48555 9.53852 7.30579 9.08171C7.12603 8.62489 7.079 8.12223 7.17064 7.63727C7.26228 7.15232 7.48848 6.70686 7.82063 6.35723C8.15278 6.0076 8.57596 5.7695 9.03667 5.67304C9.49737 5.57657 9.97491 5.62608 10.4089 5.8153C10.8429 6.00452 11.2138 6.32495 11.4747 6.73607C11.7357 7.1472 11.875 7.63055 11.875 8.125C11.8742 8.78779 11.6237 9.42319 11.1785 9.89185C10.7333 10.3605 10.1297 10.6242 9.50001 10.625Z" fill="white"/>
              </svg>
              <p class="card-text"><small class="text-muted">{{ $event->location}}</small></p>
            </div>
            <div class="attendanceButtons">
              <div id="inscribeBtn">
              <button method="post" onclick="return confirm ('Acabas de inscribirte de el evento {{$event->name}}')" class="btn button_add" type="submit">
                    <a href="{{ route('inscribe', $event->id)}}">¡Me apunto!</a>
                </button>
              </div>
              <div id="uninscribeBtn">
                <button method="post" onclick="return confirm ('Acabas de desinscribirte de el evento {{$event->name}}')" class="btn button_add" type="submit">
                    <a href="{{ route('cancelInscription', $event->id)}}">Ya no voy</a>
                </button>
              </div>
            </div>
          </div>
          <div class="fifthRow">
            <p class="card-text" id="eventDate">{{ $event-> spaces}}</p>
            @if(Auth::check() && Auth::user()->isAdmin)
            <div id="addToSlider">
                <button class="addButtonSlider btn btn-sm" onclick="return confirm ('Deseas Agregar la imagen de {{$event->name}} al Slider? ')" class="btn btn-warning button_add" type="submit">
                  <a>
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 0.25C6.40625 0.25 0.25 6.40625 0.25 14C0.25 21.5938 6.40625 27.75 14 27.75C21.5938 27.75 27.75 21.5938 27.75 14C27.75 6.40625 21.5938 0.25 14 0.25ZM15.25 19C15.25 19.3315 15.1183 19.6495 14.8839 19.8839C14.6495 20.1183 14.3315 20.25 14 20.25C13.6685 20.25 13.3505 20.1183 13.1161 19.8839C12.8817 19.6495 12.75 19.3315 12.75 19V15.25H9C8.66848 15.25 8.35054 15.1183 8.11612 14.8839C7.8817 14.6495 7.75 14.3315 7.75 14C7.75 13.6685 7.8817 13.3505 8.11612 13.1161C8.35054 12.8817 8.66848 12.75 9 12.75H12.75V9C12.75 8.66848 12.8817 8.35054 13.1161 8.11612C13.3505 7.8817 13.6685 7.75 14 7.75C14.3315 7.75 14.6495 7.8817 14.8839 8.11612C15.1183 8.35054 15.25 8.66848 15.25 9V12.75H19C19.3315 12.75 19.6495 12.8817 19.8839 13.1161C20.1183 13.3505 20.25 13.6685 20.25 14C20.25 14.3315 20.1183 14.6495 19.8839 14.8839C19.6495 15.1183 19.3315 15.25 19 15.25H15.25V19Z" fill="white"/>
                  </svg>

                  </a>
                </button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</section>
{{ $eventsFut->links() }}

<div class="separate">
<h2 class="p-2 m-1 border-0">Eventos antiguos:</h2>
</div>

@foreach ($eventsPast as $event)

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src=" {{ $event->image}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="firstRow">
            <h5 class="card-title" id="eventName">{{ $event->name}}</h5>
            @if(Auth::check() && Auth::user()->isAdmin)
            <div class="adminButtons">
              <div id="editButton">
                <a id=“editButton” href="{{ route('editEvent', ['id' => $event->id]) }}">
                  <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.0066 3.12457L13.8754 4.99254M13.2083 1.47897L8.15505 6.53226C7.89395 6.79299 7.71588 7.12519 7.64328 7.48697L7.17651 9.82347L9.51301 9.35582C9.87478 9.28346 10.2065 9.10611 10.4677 8.84493L15.521 3.79164C15.6729 3.63979 15.7933 3.45951 15.8755 3.26111C15.9577 3.0627 16 2.85006 16 2.63531C16 2.42055 15.9577 2.20791 15.8755 2.0095C15.7933 1.8111 15.6729 1.63082 15.521 1.47897C15.3692 1.32712 15.1889 1.20666 14.9905 1.12448C14.7921 1.0423 14.5794 1 14.3647 1C14.1499 1 13.9373 1.0423 13.7389 1.12448C13.5405 1.20666 13.3602 1.32712 13.2083 1.47897V1.47897Z" stroke="#78290F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.2354 11.5882V14.2353C14.2354 14.7033 14.0495 15.1522 13.7185 15.4831C13.3876 15.8141 12.9387 16 12.4707 16H2.76472C2.29669 16 1.84783 15.8141 1.51688 15.4831C1.18593 15.1522 1 14.7033 1 14.2353V4.52931C1 4.06128 1.18593 3.61241 1.51688 3.28146C1.84783 2.95051 2.29669 2.76459 2.76472 2.76459H5.41181" stroke="#78290F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
              <div id="deleteButton">
                <form action="{{ route('delete',['id'=> $event->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <a type="button" onclick="return confirm ('¿Estás seguro de querer eliminar este Evento? {{$event->name}}')">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.75H11.25C11.25 3.41848 11.1183 3.10054 10.8839 2.86612C10.6495 2.6317 10.3315 2.5 10 2.5C9.66848 2.5 9.35054 2.6317 9.11612 2.86612C8.8817 3.10054 8.75 3.41848 8.75 3.75V3.75ZM7.5 3.75C7.5 3.08696 7.76339 2.45107 8.23223 1.98223C8.70107 1.51339 9.33696 1.25 10 1.25C10.663 1.25 11.2989 1.51339 11.7678 1.98223C12.2366 2.45107 12.5 3.08696 12.5 3.75H17.5C17.6658 3.75 17.8247 3.81585 17.9419 3.93306C18.0592 4.05027 18.125 4.20924 18.125 4.375C18.125 4.54076 18.0592 4.69973 17.9419 4.81694C17.8247 4.93415 17.6658 5 17.5 5H16.795L15.2887 16.0475C15.1866 16.7962 14.8166 17.4825 14.2474 17.9793C13.6781 18.4762 12.9481 18.75 12.1925 18.75H7.8075C7.0519 18.75 6.32189 18.4762 5.75263 17.9793C5.18336 17.4825 4.81341 16.7962 4.71125 16.0475L3.205 5H2.5C2.33424 5 2.17527 4.93415 2.05806 4.81694C1.94085 4.69973 1.875 4.54076 1.875 4.375C1.875 4.20924 1.94085 4.05027 2.05806 3.93306C2.17527 3.81585 2.33424 3.75 2.5 3.75H7.5ZM8.75 8.125C8.75 7.95924 8.68415 7.80027 8.56694 7.68306C8.44973 7.56585 8.29076 7.5 8.125 7.5C7.95924 7.5 7.80027 7.56585 7.68306 7.68306C7.56585 7.80027 7.5 7.95924 7.5 8.125V14.375C7.5 14.5408 7.56585 14.6997 7.68306 14.8169C7.80027 14.9342 7.95924 15 8.125 15C8.29076 15 8.44973 14.9342 8.56694 14.8169C8.68415 14.6997 8.75 14.5408 8.75 14.375V8.125ZM11.875 7.5C11.7092 7.5 11.5503 7.56585 11.4331 7.68306C11.3158 7.80027 11.25 7.95924 11.25 8.125V14.375C11.25 14.5408 11.3158 14.6997 11.4331 14.8169C11.5503 14.9342 11.7092 15 11.875 15C12.0408 15 12.1997 14.9342 12.3169 14.8169C12.4342 14.6997 12.5 14.5408 12.5 14.375V8.125C12.5 7.95924 12.4342 7.80027 12.3169 7.68306C12.1997 7.56585 12.0408 7.5 11.875 7.5Z" fill="#78290F" />
                      </svg>
                    </a>
                </form>
              </div>
            </div>
            @endif
          </div>
          <p class="card-text" id="eventDate">{{ $event->date}}</p>
          <p class="card-text" id="eventDate">{{ $event->description}}</p>
          <div class="fourthRow">
            <p class="card-text"><small class="text-muted">{{ $event->location}}</small></p>
            <div class="attendanceButtons">
              <div id="inscribeBtn">
              <button method="post" onclick="return confirm ('Acabas de inscribirte de el evento {{$event->name}}')" class="btn button_add" type="submit">
                    <a href="{{ route('inscribe', $event->id)}}">¡Me apunto!</a>
                </button>
              </div>
              <div id="uninscribeBtn">
                <button method="post" onclick="return confirm ('Acabas de desinscribirte de el evento {{$event->name}}')" class="btn button_add" type="submit">
                    <a href="{{ route('cancelInscription', $event->id)}}">Ya no voy</a>
                </button>
              </div>
            </div>
          </div>
          <div class="fifthRow">
            <p class="card-text" id="eventDate">{{ $event-> spaces}}</p>
            @if(Auth::check() && Auth::user()->isAdmin)
            <div id="addToSlider">
                <button class="addButtonSlider btn btn-dark btn-sm" onclick="return confirm ('Deseas Agregar la imagen de {{$event->name}} al Slider? ')" class="btn btn-warning button_add" type="submit">
                  <a>
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.25C7.40625 1.25 1.25 7.40625 1.25 15C1.25 22.5938 7.40625 28.75 15 28.75C22.5938 28.75 28.75 22.5938 28.75 15C28.75 7.40625 22.5938 1.25 15 1.25ZM16.25 20C16.25 20.3315 16.1183 20.6495 15.8839 20.8839C15.6495 21.1183 15.3315 21.25 15 21.25C14.6685 21.25 14.3505 21.1183 14.1161 20.8839C13.8817 20.6495 13.75 20.3315 13.75 20V16.25H10C9.66848 16.25 9.35054 16.1183 9.11612 15.8839C8.8817 15.6495 8.75 15.3315 8.75 15C8.75 14.6685 8.8817 14.3505 9.11612 14.1161C9.35054 13.8817 9.66848 13.75 10 13.75H13.75V10C13.75 9.66848 13.8817 9.35054 14.1161 9.11612C14.3505 8.8817 14.6685 8.75 15 8.75C15.3315 8.75 15.6495 8.8817 15.8839 9.11612C16.1183 9.35054 16.25 9.66848 16.25 10V13.75H20C20.3315 13.75 20.6495 13.8817 20.8839 14.1161C21.1183 14.3505 21.25 14.6685 21.25 15C21.25 15.3315 21.1183 15.6495 20.8839 15.8839C20.6495 16.1183 20.3315 16.25 20 16.25H16.25V20Z" fill="white"/>
                  </svg>
                  </a>
                </button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</main>
@endsection
