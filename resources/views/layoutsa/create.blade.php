@extends('template.welcome')

@section('content')
<h1 class="text-center">Creer un Article</h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
    @endforeach
  </ul>

</div>
  
@endif
<form action="{{route('articles.store')}} " method="post" enctype="multipart/form-data">
@csrf

<div class="mb-3">
  <label  class="form-label">Nom</label>
  <input type="text" class="form-control" value="{{old('name')}} " name="name" >
</div>
<div class="mb-3">
  <label  class="form-label">Description</label>
  <input type="text" class="form-control" value="{{old('description')}}"   name="description" >
</div>
<div class="mb-3">
  <label  class="form-label">Date</label>
  <input type="text" class="form-control" value="{{old('date')}}"   name="date" >
</div>
<div class="mb-3">
  <label  class="form-label">Auteur</label>
  <input type="text" class="form-control" value="{{old('auteur')}}"   name="auteur" >
</div>
<div class="mb-3">
  <label  class="form-label">Image</label>
  <input type="file" class="form-control" value="{{old('image')}}"   name="image" rows="3">
</div>

<button type="submit" class="btn btn-info" >Create</button>


</form>





@endsection