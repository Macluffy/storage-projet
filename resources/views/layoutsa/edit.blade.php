@extends('template.welcome')

@section('content')
<h1 class="text-center">edit article</h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
    @endforeach
  </ul>

</div>
  
@endif
<form action="{{route('articles.update' , $article->id)}} " method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="mb-3">
  <label  class="form-label">Nom</label>
  <input type="text" class="form-control" value="{{$article->nom}}"  name="name" >
</div>
<div class="mb-3">
  <label  class="form-label">Description</label>
  <input type="text" class="form-control" value="{{$article->description}}"  name="description" >
</div>
<div class="mb-3">
  <label  class="form-label">Date</label>
  <input type="text" class="form-control" value="{{$article->date}}"  name="date" >
</div>
<div class="mb-3">
  <label  class="form-label">Auteur</label>
  <input type="text" class="form-control" value="{{$article->auteur}}"  name="auteur" >
</div>
<div class="mb-3">
  <label  class="form-label">Image</label>
  <input type="file" class="form-control" value="{{$article->image}}"  name="image" >
</div>





<button type="submit" class="btn btn-info" >edit</button>


</form>



@endsection