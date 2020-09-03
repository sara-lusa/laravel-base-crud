<h1>{{$movie->title}}</h1>

<ul>
  <li>Year: {{$movie->year}}</li>
  <li>Description: {{$movie->description}}</li>
  <li>Rating: {{$movie->rating}}</li>
</ul>

<a href="{{route('movies.index')}}">Torna alla lista</a>
