@extends('template.welcome')

@section('content')
<h1 class="text-center">edit users</h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
    @endforeach
  </ul>

</div>
  
@endif
<form action="{{route('users.update' , $user->id)}} " method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="mb-3">
  <label  class="form-label">Nom</label>
  <input type="text" class="form-control" value="{{$user->nom}}"  name="name" >
</div>
<div class="mb-3">
  <label  class="form-label">Prenom</label>
  <input type="text" class="form-control" value="{{$user->prenom}}"  name="prenom" >
</div>
<div class="mb-3">
  <label  class="form-label">Age</label>
  <input type="text" class="form-control" value="{{$user->age}}"  name="age" >
</div>
<div class="mb-3">
  <label  class="form-label">Email</label>
  <input type="text" class="form-control" value="{{$user->email}}"  name="email" >
</div>
<div class="mb-3">
  <label  class="form-label">Password</label>
  <input type="text" class="form-control" value="{{$user->password1}}"  name="Password1" >
</div>
<div class="mb-3">
  <label  class="form-label">Date de naissance</label>
  <input type="text" class="form-control" value="{{$user->naissance}}"  name="naissance"  >
</div>
<div class="mb-3">
  <label  class="form-label">Photo</label>
  <input type="file" class="form-control" value="{{$user->photo}}"  name="photo" rows="3">
</div>




<button type="submit" class="btn btn-info" >edit</button>


</form>



@endsection