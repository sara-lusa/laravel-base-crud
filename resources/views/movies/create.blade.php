<h1>Aggiungi un film!</h1>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
</div>
@endif

<form action="{{route('movies.store')}}" method="post">
@csrf
@method('POST')

<label>Title</label><br>
<input type="text" name="title" value="{{old('title')}}"><br>

<label>Year</label><br>
<input type="text" name="year" value="{{old('year')}}"><br>

<label>Description</label><br>
<textarea name="description" rows="8" cols="80" value="{{old('description')}}"></textarea><br>

<label>Rating</label><br>
<input type="text" name="rating" value="{{old('rating')}}"><br>

<input type="submit" value="Invia">
</form>
