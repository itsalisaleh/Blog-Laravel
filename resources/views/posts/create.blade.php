@extends('Layouts.app')

@section('title') create @endsection


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="container">
  <form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3 ">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text"  name="title" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{old('title')}}">
    </div>
    <div class="mb-3 ">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
    </div>

    <select name="selection"  class="form-select mt-3 " aria-label="Default select example">
      @foreach ($allusers as $user)

            <option value="{{$user->id}}">{{$user->name}}</option>
            
            
              
      @endforeach
    </select>

      <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>
    
    

</div>
@endsection