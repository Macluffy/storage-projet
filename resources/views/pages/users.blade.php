@extends('template/welcome')




@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Age</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Naissance</th>
        <th scope="col">Photo</th>
        <th scope="col">Button</th>

      </tr>
    </thead>
    
        
    
    <tbody>
    @foreach ($data as $value)
      <tr>
        <th scope="row">{{$value->id}} </th>
        <td>{{$value->nom}} </td>
        <td>{{$value->prenom}} </td>
        <td>{{$value->age}} </td>
        <td>{{$value->email}} </td>
        <td>{{$value->password1}} </td>
        <td>{{$value->naissance}} </td>
        <td><img style="width: 100px;" src="{{asset('img/'. $value->photo)}}" alt="">  </td>
        <td class="d-flex justify-content-center">
            <a href="{{route('users.edit', $value->id)}} " class="btn btn-info">Edit</a>


            <a href="{{route('users.show', $value->id)}}" class="btn btn-warning">Show</a>
            

            <form action="{{route('users.destroy', $value->id)}}" method="post">
              
              @csrf 
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>

            </form>
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-secondary" href="{{route('users.create')}}">Create users</a>




    
@endsection