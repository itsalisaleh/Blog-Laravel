@extends('Layouts.app')

@section('title') show @endsection

@section('content')
        <div class="card mt-5 w-50">
            <div class="card-header">
            Post Info
            </div>
            <div class="card-body">
            <h5 class="card-title">Title : {{$singlePost->title}}</h5>
            <p class="card-text">Descriptions: {{$singlePost->description}}</p>
            </div>
        </div>

        <div class="card mt-5 w-50">
            <div class="card-header">
            Post Creator Info
            </div>
            <div class="card-body">
            <h5 class="card-title">Name: {{$singlePost->user ? $singlePost->user->name : "Not Found"}}</h5>
            <p class="card-text">Email: {{$singlePost->user ? $singlePost->user->email : "Not Found"}}</p>
            <p class="card-text mt-1">{{$singlePost->user ? $singlePost->user->created_at : "Not Found"}}</p>

            </div>
        </div>
 @endsection     
      
      
