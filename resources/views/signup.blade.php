{{-- @extends('layout')
@section('content') --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="container"> 
        
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
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    
       </p>
        <div class="jumbotron my-5 col-sm-8 align-center">
            <h1 class="h1 my-3 text-center">Sign_Up</h1>
        <form action="{{route('registor')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="contact">Contact number:</label>
                    <input type="text" name="contact" class="form-control" id="contact">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                {{-- <div class="form-group">
                    <label for="conpass">Confirm Password:</label>
                    <input type="password" name="conpass" class="form-control" id="conpass">
                </div> --}}
                <button type="submit" class="btn btn-success my-3">SignUp</button>
            </form>
        Do you want to <a href="signin">login</a>        
        </div>
    </div>  
{{-- @endsection --}}
<footer class="bg-dark"style="left:0;bottom:0;width:100%;position: fixed;text-align:center;background-color:#f8f9fa!important;">@copy right by Resto</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
