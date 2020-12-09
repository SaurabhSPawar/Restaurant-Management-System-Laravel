@extends('layout')
@section('content')
  {{-- <div> this is content of home</div>  --}}
  
<table class="table table-striped "style="height:270px;" >
  <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    
      @foreach ($data as $item)
          <tr scope="row">
              <th>{{$item->id}}</th><td>{{$item->name}}</td><td>{{$item->email}}</td>
          <td>{{$item->address}}</td><td 
          ><img src ='storage/app/{{$item->IMAGE}}' style="max-width:100px;height:70px;"></td>
         
          </tr>
      @endforeach
  
</table>
<div class="d-flex justify-content-center">
{{$data->links()}}
</div>

@endsection
