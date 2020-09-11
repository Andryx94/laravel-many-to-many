<h1>{{$car->manufacturer}} ({{$car->year}})</h1>
<p>Motore: {{$car->engine}}</p>
<p>Targa: {{$car->plate}}</p>

<p>Tag:</p>
<ul>
  @foreach ($car->tags as $tag)
    <li>{{$tag->name}}</li>
  @endforeach
</ul>

<h2>Proprietario</h2>
<p>Nome: {{ $car->user->name }}</p>
<p>Email: {{ $car->user->email }}</p>

<a href="{{route('cars.index')}}">< Torna indietro</a>
