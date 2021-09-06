@extends('template.welcome')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
    @endforeach
  </ul>

</div>
  
@endif
<div class="card" style="width: 18rem;">
  <img src="{{$user->photo}}" class="card-img-top">
  <div class="card-body ">
    <h5 class="card-title">{{$user->nom}} </h5>
    <p class="card-text">{{$user->prenom}}</p>
    <p class="card-text">{{$user->age}}</p>
    <p class="card-text">{{$user->email}}</p>
    <p class="card-text">{{$user->password1}}</p>
    <p class="card-text">{{$user->naissance}}</p>
    <a href="{{route('users.create')}}" class="btn btn-primary">Go back</a>
  </div>
</div>



@endsection