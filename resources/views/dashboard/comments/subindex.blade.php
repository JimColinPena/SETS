@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
    @foreach($comments as $comment)
      <h1>{{ $comment->text}}</h1>
      <button><a href="{{route('user.post')}}">Back</a></button>
      <button><a href="{{route('user.createsubposts', ['id' => $comment->id ])}}">Add comment</a></button>
    @endforeach

  @foreach($subcomments as $subcomment)
      <div class="card">
            <div class="card-body">
              <a href="{{ route('user.deletesubposts', ['id' => $subcomment->id ])}}">x</a>
              <h5 class="card-title">{{ $subcomment->text }}</h5>
              <h6 class="card-text">Uploaded By:{{$subcomment->first_name}}</h6>
              <h6 class="card-text">Uploaded At:{{ $subcomment->created_at}}</h6>
            </div>
          </div>
  @endforeach
  </div>
@endsection 

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection