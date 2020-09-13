@extends('layouts.app')
@section('section')

  <div class="cars_create_edit">
    <h1>Modifica auto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('cars.update', $car)}}" method="post">
      @csrf
      @method('PUT')

      <div class="form manufacture">
        <label>Produttore</label>
        <input type="text" name="manufacturer" value="{{$car->manufacturer}}">
      </div>

      <div class="form model">
        <label>Modello</label>
        <input type="text" name="model" value="{{$car->model}}">
      </div>

      <div class="form engine">
        <label>Motore</label>
        <input type="text" name="engine" value="{{$car->engine}}">
      </div>

      <div class="form year">
        <label>Anno</label>
        <input type="number" name="year" value="{{$car->year}}">
      </div>

      <div class="form plate">
        <label>Targa</label>
        <input type="text" name="plate" value="{{$car->plate}}">
      </div>

      <div class="checkboxes">
        @foreach ($tags as $tag)
          <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($car->tags->contains($tag)) ? 'checked' : ''}}>
          <label>{{$tag->name}}</label>
        @endforeach
      </div>

      <div class="owners">
        <label>Proprietario</label>
        <select name="user_id">
          @foreach ($users as $user)
            <option value="{{$user->id}}" {{($user->id == $car->user_id) ? 'selected' : ""}}>{{$user->name}}</option>
          @endforeach
        </select>
      </div>

      <input type="submit" value="Modifica" class="button">
    </form>
  </div>
@endsection
