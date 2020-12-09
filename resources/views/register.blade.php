@extends('layout')
@section('content')
    <div class="container"> 
        <h1 class="h1 my-3">Add Restaurent details</h1>
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
            <form action="{{route('data')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Restaurent Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="address">Restaurent Address:</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>        
        </div>
    </div>  
@endsection