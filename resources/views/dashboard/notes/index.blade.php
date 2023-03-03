@extends('layouts.master')
@section('title')
    Notes
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
    <h1>Your Notes</h1>
    <button><a href="{{route('user.createnotes')}}">Add Notes</a></button>
      <div class="col-md-12">
        <div class="row" style="margin-bottom: 150px;">
        @foreach($note as $notes)
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <a href="{{ route('user.deletenotes', ['id' => $notes->id ])}}" style="float: right;">x</a>
              <h5 class="card-title"><strong>{{ $notes->title }}</strong></h5>
              <p class="card-text">{{ $notes->text }}</p>
              <p class="card-text" style="font-size: small;"><strong>Uploaded:{{ $notes->created_at}}</strong></p>
            </div>
          </div>
        @endforeach
        </div>
      </div>
  </div>
@endsection  

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection