@extends('layouts.app')
@section('section')
  <div class="cars_show">
    <h1>{{$car->manufacturer}} {{$car->model}} ({{$car->year}})</h1>

    <p>Motore: {{$car->engine}}</p>
    <p>Targa: {{$car->plate}}</p>
    <ul>
      @foreach ($car->tags as $tag)
        <li>{{$tag->name}}</li>
      @endforeach
    </ul>

    <h2>Proprietario</h2>

    <p>Nome: {{ $car->user->name }}</p>
    <p>Email: {{ $car->user->email }}</p>
    <p>Numero: +39 {{ $car->user->phone_number }}</p>

    <a href="{{route('cars.edit', $car)}}" class="button">Modifica auto</a>
    <form action="{{ route('cars.destroy', $car->id)}}" method="post">
      @csrf
      @method('DELETE')
      <input type="submit" value="Cancella auto" class="button delete" onclick="return confirm('Sei sicuro di voler cancellare {{$car->manufacturer}} {{$car->model}} ({{$car->year}})?')">
    </form>
  </div>
@endsection
