@extends('layouts.app')
@section('section')

  <div class="cars_create_edit">
    <h1>Aggiungi auto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('cars.store')}}" method="post">
      @csrf
      @method('POST')

      <div class="form manufacture">
        <label>Produttore</label>
        <input type="text" name="manufacturer" value="{{old('manufacturer')}}">
      </div>

      <div class="form model">
        <label>Modello</label>
        <input type="text" name="model" value="{{old('model')}}">
      </div>

      <div class="form engine">
        <label>Motore</label>
        <input type="text" name="engine" value="{{old('engine')}}">
      </div>

      <div class="form year">
        <label>Anno</label>
        <input type="number" name="year" value="{{old('year')}}">
      </div>

      <div class="form plate">
        <label>Targa</label>
        <input type="text" name="plate" value="{{old('plate')}}">
      </div>

      <div class="checkboxes">
        @foreach ($tags as $tag)
          <input type="checkbox" name="tags[]" value="{{$tag->id}}">
          <label>{{$tag->name}}</label>
        @endforeach
      </div>

      <div class="owners">
        <label>Proprietario</label>
        <select name="user_id">
          @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>

      <input type="submit" value="Aggiungi" class="button">
    </form>
  </div>
@endsection
