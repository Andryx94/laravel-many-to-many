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

  <label>Produttore</label>
  <input type="text" name="manufacturer" value="{{$car->manufacturer}}">

  <label>Anno</label>
  <input type="number" name="year" value="{{$car->year}}">

  <label>Motore</label>
  <input type="text" name="engine" value="{{$car->engine}}">

  <label>Targa</label>
  <input type="text" name="plate" value="{{$car->plate}}">
  <br>
  <br>

  <label>Tag:</label>
  <div class="checkboxes">
    @foreach ($tags as $tag)
      <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($car->tags->contains($tag)) ? 'checked' : ''}}>
      <label>{{$tag->name}}</label>
      <br>
    @endforeach
  </div>
  <br>

  <label>Proprietario</label>
  <div class="owners">
    <select name="user_id">
      @foreach ($users as $user)
        <option value="{{$user->id}}" {{($user->id == $car->user_id) ? 'selected' : ""}}>{{$user->name}}</option>
      @endforeach
    </select>
    <br>
  </div>
  <br>

  <input type="submit" value="Invia">
</form>

<a href="{{route('cars.show', $car)}}">< Torna indietro</a>
