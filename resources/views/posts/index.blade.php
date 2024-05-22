@extends('Layouts.app')

@section('title') index @endsection
@section('content')
    

      <div class="text-center mt-4">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-primary">Create Post</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          
            <tr>
              <th>{{$post->id}}</th>
              <td>{{$post->title}}</td>
              <td>{{$post->user ? $post->user->name : "Not Found"}}</td>
              <td>{{$post->created_at}}</td>
              <td>
                  <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">Views</a>
                  <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                  <form style="display: inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                  </form>
                  
              </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    
    @endsection
    
