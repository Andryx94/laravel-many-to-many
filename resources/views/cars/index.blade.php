<h1>Parco auto</h1>

<ul>
  @foreach ($cars as $car)
    <li>
      <a href="{{route('cars.show',$car)}}">{{$car->manufacturer}} ({{$car->year}})</a>

      <form action="{{ route('cars.destroy', $car->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella">
      </form>
    </li>
    <hr>
  @endforeach
</ul>

<a href="{{route('cars.create')}}">Aggiungi auto</a>
