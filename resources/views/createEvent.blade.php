@extends('layouts.app')

@section('content')
<div class="subtitle-create">
  <h3 class="text-subtitle">Registro de nuevos eventos</h3>
</div>


<div class="grid-temaplete">

  <div class="div-form">
    <legend class="legend">Registrá tu evento <br> <span class="legend bold">Aquí</span></legend>
    <form class="form_create" action="{{ route('storeEvent') }}" method="post">
      @csrf
      <div>
        <label for="inputName" class="form-label" require>Nombre</label>
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de tu evento">
      </div>
      <div>
        <label for="inputDate" class="form-label" require>Fecha y Hora</label>
        <input type="date" class="form-control" id="inputDate" name="date" placeholder="Fecha y hora de tu evento">
      </div>
      <div>
        <label for="inputLocation" class="form-label" require>Ubicación</label>
        <input type="text" class="form-control" id="inputLocation" name="location" placeholder="ubicacion de tu evento">
      </div>
      <div>
        <label for="inputSpaces" class="form-label" require>Capacidad de asistentes</label>
        <input type="number" class="form-control" id="inputSpaces" name="spaces" placeholder="capacidad de asistentes">
      </div>
      <div>
        <label for="inputGenre" class="form-label" require>Genereo musical</label>
        <input type="text" class="form-control" id="inputGenre" name="musical_genre" placeholder="Genero Musical de tu evento ">
      </div>
      <div>
        <label for="inputImage" class="form-label" require>Imagen</label>
        <input type="text" class="form-control" id="inputImage" name="image" placeholder="imagen de tu evento">
      </div>
      <div>
        <label for="inputDescription" class="form-label" require>Descripción</label>
        <textarea type="text" class="form-control" id="inputDescription" name="description" maxlength="250" placeholder="Descripcion de tu evento"></textarea>
      </div>
      <br><br>
      <button type="submit" class="button-create" value="create">Registrar</button>
    </form>
  </div>
  <button class="button-back-home">
    <a class="text-return-create" href="{{ route('home') }}">
      <div type="back">Cancelar</div>
    </a>
  </button>
</div>






@endsection