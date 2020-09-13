@extends('layouts.app')
@section('section')

  <div class="cars_index">
    @foreach ($cars as $car)
      <div class="box">
        <a href="{{route('cars.show',$car)}}">{{$car->manufacturer}} {{$car->model}} ({{$car->year}})</a>
      </div>
    @endforeach
  </div>
@endsection
