@extends('template.welcome')

@section('content')
<h1 class="text-center">Creer un Users</h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
    @endforeach
  </ul>

</div>
  
@endif
<form action="{{route('users.store')}} " method="post" enctype="multipart/form-data">
@csrf

<div class="mb-3">
  <label  class="form-label">Nom</label>
  <input type="text" class="form-control" value="{{old('name')}}"   name="name" >
</div>
<div class="mb-3">
  <label  class="form-label">Prenom</label>
  <input type="text" class="form-control" value="{{old('prenom')}}"   name="prenom" >
</div>
<div class="mb-3">
  <label  class="form-label">Age</label>
  <input type="text" class="form-control" value="{{old('age')}}"   name="age" >
</div>
<div class="mb-3">
  <label  class="form-label">Email</label>
  <input type="text" class="form-control" value="{{old('email')}}"   name="email" >
</div>
<div class="mb-3">
  <label  class="form-label">Password</label>
  <input type="text" class="form-control" value="{{old('password1')}}"   name="password1" >
</div>
<div class="mb-3">
  <label  class="form-label">Date de naissance</label>
  <input type="text" class="form-control" value="{{old('naissance')}}"   name="naissance"  >
</div>
<div class="mb-3">
  <label  class="form-label">Photo</label>
  <input type="file" class="form-control" value="{{old('photo')}}"   name="photo" rows="3">
</div>

<button type="submit" class="btn btn-info" >Create</button>


</form>





@endsection