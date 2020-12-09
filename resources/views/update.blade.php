@extends('layout')
@section('content')
    <div class="container"> 
        <h1 class="h1 my-3"> Update Restaurent details</h1>
    <h4 class="h4 my-3">
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
    
    </h4>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>
            <span>
                <div>{{$error ?? " "}}</div>
            </span>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    @include('support')
        <div class="jumbotron my-5">
            <form action="{{route('FinalUpdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <?php if (isset($id)) {$x=$id;} else { $x = old('id');}?>
            <input type="hidden" name="id"  value="{{$x}}" id="id">
                {{-- {{$id}} --}}
                {{-- {{old('id')}} --}}
                <div class="form-group">
                    <label for="name">Restaurent Name:</label>
                    <?php if (isset($name)) {$x=$name;} else { $x = old('name');}?>
                <input type="text" name="name" class="form-control" value="{{$x}}" id="name">
                </div>
                {{-- {{$name}} --}}
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <?php if (isset($email)) {$x=$email;} else { $x = old('email');}?>
                <input type="text" name="email" class="form-control" value="{{$x}}" id="email">
                </div>
                {{-- {{$email}} --}}
                <div class="form-group">
                    <label for="address">Restaurent Address:</label>
                    <?php if (isset($address)) {$x=$address;} else { $x = old('address');}?>
                <input type="text" name="address" class="form-control" value="{{$x}}" id="address">
                </div>
                {{-- {{$address}} --}}

                <div class="form-group">
                    <label for="RestoImg">Restaurent Image:</label>
                    <input type="file" name="RestoImg" class="form-control" id="RestoImg">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>        
        </div>
    </div>  
@endsection