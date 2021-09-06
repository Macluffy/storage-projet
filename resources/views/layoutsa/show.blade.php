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
  <img src="{{$article->image}}" class="card-img-top">
  <div class="card-body ">
    <h5 class="card-title">{{$article->nom}} </h5>
    <p class="card-text">{{$article->description}}</p>
    <p class="card-text">{{$article->date}}</p>
    <p class="card-text">{{$article->auteur}}</p>
    <a href="{{route('articles.create')}}" class="btn btn-primary">Go back</a>
  </div>
</div>



@endsection