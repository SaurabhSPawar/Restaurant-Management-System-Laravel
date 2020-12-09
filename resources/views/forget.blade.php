{{-- @extends('layout')
@section('content') --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container"> 
        <h1 class="h1 my-3">Forget Password</h1>
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
                    Please login 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    
       </p>
        <div class="jumbotron my-5 col-sm-6">
            <form action="{{route('checkForget')}}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>

                <button type="submit" class="btn btn-success my-3">Send Password</button>
            </form> 
            Do you want to <a href="signup">Sign Up</a> <br>
            Do you want to <a href="signin">Sign In</a> <br>
                
        </div>
    </div>  
{{-- @endsection --}}
{{-- @endsection --}}
<footer class="bg-dark"style="left:0;bottom:0;width:100%;position: fixed;text-align:center;background-color:#f8f9fa!important;">@copy right by Resto</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
