@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
      <h1>Recent Post</h1>
      <button><a href="{{route('user.createposts')}}">Add Post</a></button>
  
  @foreach($comments as $comment)
      <div class="card" >
            <div class="card-body">
              <a href="{{ route('user.deleteposts', ['id' => $comment->id ])}}" style="float: right;">x</a>
              <h5 class="card-title"><a href="{{ route('user.subpost', ['id' => $comment->id ])}}">{{ $comment->text }}</a></h5>
              {{-- <p class="card-text">{{ $notes->text }}</p> --}}
              {{-- <h6 class="card-text">Uploaded By:{{ $comment->student->name}}</h6> --}}
              <p class="card-text" style="font-size: small;">
                <strong>Uploaded By: {{$comment->first_name}} &nbsp Uploaded At: {{ $comment->created_at}}</strong>
              </p>
            </div>
          </div>
  @endforeach
  </div>
@endsection 

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection