@extends('layout')
@section('content')
  <div class="container "> <p class="h2 jumbotron my-4">List Of Restaurants </p>
    <h4 class="h4 my-3">
      @if (Session::get('status'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>
              <span>
                  {{Session::get('status')}}
              </span>
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </h4>
        <div class="" >
            <table class="table table-striped table-success"style="height:270px;" >
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  
                    @foreach ($data as $item)
                        <tr scope="row">
                            <th>{{$item->id}}</th><td>{{$item->name}}</td><td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>
                          <form action="{{route('update')}}" method="post" >
                            @csrf
                            <input type="hidden" value="{{$item->id}}" name="id"/>
                            <input type="hidden" value="{{$item->name}}" name="name"/>
                            <input type="hidden" value="{{$item->address}}" name="address"/>
                            <input type="hidden" value="{{$item->email}}" name="email"/>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                          </form>
                        </td>
                        <td>
                          <form action="{{route('delete')}}" method="post" >
                            @csrf
                            <input type="hidden" value="{{$item->id}}" name="id"/>
                            <input type="hidden" value="{{$item->name}}" name="name"/>
                            <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                          </form>
                        <td>
                        </tr>
                    @endforeach
                
            </table>
            <div class="d-flex justify-content-center">
              {{$data->links()}}
            </div>
        </div>
</div>
@endsection  