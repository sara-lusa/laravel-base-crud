<h1>Lista Film Disponibili</h1>

<div class="film-list">
  <ul>
    @foreach ($movies as $movie)
      <li>Titolo: {{$movie->title}}
        <a href="{{route('movies.show', $movie->id)}}">Dettagli</a>
        <a href="{{route('movies.edit', $movie->id)}}">Modifica</a>
      </li>
    @endforeach
  </ul>

  <a href="{{route('movies.create')}}">Aggiungi un film</a>
</div>
