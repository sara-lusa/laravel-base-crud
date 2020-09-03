<h1>Modifica il film '{{$movie->title}}'</h1>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
</div>
@endif

<form action="{{route('movies.update', $movie->id)}}" method="post">
@csrf
@method('PUT')

<label>Title</label><br>
<input type="text" name="title" value="{{$movie->title}}"><br>

<label>Year</label><br>
<input type="text" name="year" value="{{$movie->year}}"><br>

<label>Description</label><br>
<textarea name="description" rows="8" cols="80">{{$movie->description}}</textarea><br>

<label>Rating</label><br>
<input type="text" name="rating" value="{{$movie->rating}}"><br>

<input type="submit" value="Salva">
</form>
