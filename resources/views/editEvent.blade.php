@extends('layouts.app')

@section('content')
<div class="edit-title">
  <h3 class="card-title">Edita tú evento</h3>
</div>
<div class="card-body">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  <form action="{{ route('updateEvent', $event->id)}}" method="post" class="form-edit">
  <legend class="legend">Edita tu evento <br> <span class="legend bold">Aquí</span></legend>
    @method('PATCH')
    @csrf
    <div class="mb-3">
      <label for="inputName" class="form-label-edit">Nombre</label>
      <input type="text" class="form-control" id="inputName" name="name" value="{{ $event->name }}">
    </div>
    <div class="mb-3">
    <label for="inputDate" class="form-label-edit">Fecha y hora</label>
      <input type="date" class="form-control" id="inputDate" name="date" value="{{ $event->date }}">
    </div>
    <div class="mb-3">
      <label for="inputLocation" class="form-label-edit">Ubicación</label>
      <input type="text" class="form-control" id="inputLocation" name="location" value="{{ $event->location }}">
    </div>
    <div class="mb-3">
      <label for="inputSpaces" class="form-label-edit">Capacidad</label>
      <input type="text" class="form-control" id="inputSpaces" name="spaces" value="{{ $event->spaces }}">
    </div>
    <div class="mb-3">
      <label for="inputGenre" class="form-label-edit">Genero Musical</label>
      <input type="text" class="form-control" id="inputGenre" name="musical_genre" value="{{ $event->musical_genre }}">
    </div>
    <div class="mb-3">
      <label for="inputImage" class="form-label-edit">Imagen</label>
      <input type="text" class="form-control" id="inputImage" name="image" value="{{ $event->image }}">
    </div>
    <div class="mb-3">
      <label for="inputDescription" class="form-label-edit">Descripción</label>
      <input type="text" class="form-control" id="inputDescription" name="description" maxlength="250" value="{{ $event->description }}">
    </div>
    <button type="submit" class="button-edit" value="save">Guardar</button>
  </form>
</div>
<button class="button-back-home">
  <a class="text-return-create" href="{{ route('home') }}">
    <div type="back">Cancelar</div>
  </a>
</button>

@endsection