<h1>Parco auto</h1>

<ul>
  @foreach ($cars as $car)
    <li>
      <a href="{{route('cars.show',$car)}}">{{$car->manufacturer}} ({{$car->year}})</a>
    </li>
    <hr>
  @endforeach
</ul>

<a href="{{route('cars.create')}}">Aggiungi auto</a>
