@extends('Layouts.app')

@section('title') edit @endsection


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
  <form method="POST" action="{{route('posts.update',$singlepost->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3 ">
      <label for="exampleInputEmail1"  class="form-label">Title</label>
      <input type="text" name="title" value="{{$singlepost->title}}" value="{{old('title')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 ">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"> {{$singlepost->description}} {{old('description')}}</textarea>
    </div>

    <select name="selection" class="form-select mt-3 " aria-label="Default select example">
        @foreach ($allusers as $user)

          <option @if($user->id == $singlepost->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
      
        @endforeach
    </select>

      <button type="submit" class="btn btn-primary mt-3">update</button>
  </form>
    
    

</div>
@endsection