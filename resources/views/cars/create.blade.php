@extends('layouts.app')
@section('section')
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

    <label>Produttore</label>
    <input type="text" name="manufacturer" value="{{old('manufacturer')}}">

    <label>Anno</label>
    <input type="number" name="year" value="{{old('year')}}">

    <label>Motore</label>
    <input type="text" name="engine" value="{{old('engine')}}">

    <label>Targa</label>
    <input type="text" name="plate" value="{{old('plate')}}">
    <br>
    <br>

    <label>Tag:</label>
    <div class="checkboxes">
      @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">
        <label>{{$tag->name}}</label>
        <br>
      @endforeach
    </div>
    <br>

    <label>Proprietario</label>
    <div class="owners">
      <select name="user_id">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
      <br>
    </div>
    <br>


    <input type="submit" value="Invia">
  </form>
@endsection
