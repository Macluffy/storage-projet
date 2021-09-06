@extends('template/welcome')




@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">date</th>
        <th scope="col">auteur</th>
        <th scope="col">image</th>
        <th scope="col">button</th>
      </tr>
    </thead>
    
        
    
    <tbody>
    @foreach ($data as $value)
      <tr>
        <th scope="row">{{$value->id}} </th>
        <td>{{$value->nom}} </td>
        <td>{{$value->description}} </td>
        <td>{{$value->date}} </td>
        <td>{{$value->auteur}} </td>
        <td><img style="width: 50px;" src="{{asset('img/' .$value->image)}}" alt=""> </td>
        <td class="d-flex justify-content-center">
            <a href="{{route('articles.edit', $value->id)}} " class="btn btn-info">Edit</a>


            <a href="{{route('articles.show', $value->id)}}" class="btn btn-warning">Show</a>
            

            <form action="{{route('articles.destroy', $value->id)}}" method="post">
              
              @csrf 
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>

            </form>
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-secondary" href="{{route('articles.create')}}">Create image</a>




    
@endsection