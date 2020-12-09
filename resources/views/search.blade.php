@extends('layout')
@section('content')
    <div class="container"> 
        <h1 class="h1 my-3">Search Restaurent</h1>
        <p class=" my-3">
            @if ($errors->all())
            <div class="alert alert-danger alert-dismissible fade show page1" role="alert">
                <strong>
                    <span>
                        @foreach($errors->all() as $e)
                            {{$e}}<br>
                        @endforeach 
                    </span>
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </p>
        <p class="my-3">    
            @if (Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <span>
                            {{Session::get('status')}}
                        </span>
                    </strong>
                    to see changes click here<a href="{{route('list')}}" type="butten" class="btn btn-primary btn-sm mx-4">Click</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    
       </p>
        <div class="jumbotron my-5">
            <form action="{{route('search')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Restaurent Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>        
        </div>
        
        <table class="table table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
        @if(!isset($data))
           
        @else                    
            @foreach ($data as $item)
                <tr scope="row">
                    <th>{{$item->id ?? ''}}</th>
                    <td>{{$item->name ?? ''}}</td>
                    <td>{{$item->email ?? ''}}</td>
                    <td>{{$item->address ?? ''}}</td>
                </tr>
            @endforeach
        @endif
        </table>    
    </div>  
@endsection