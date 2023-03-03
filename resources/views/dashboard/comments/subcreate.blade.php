@extends('layouts.master')
@section('title')
    Add comments
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-12 col-md-offset-4">
        <form class="" action="{{ route('user.addsubposts') }}" method="post">
            {{ csrf_field() }}
            {{-- <div class="row"> --}}
              @foreach($comments as $comment)
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
              @endforeach
                <div class="form-group  col-md-8">
                    <label for="mytext">Text</label>
                    <textarea rows="6" cols="50" name="mytext" id="mytext" class="form-control"></textarea>
                    {{-- <input type="textarea" name="mytext" id="mytext" class="form-control"> --}}
                </div>
            {{-- </div> --}}
              <input type="submit" value="Add Comment" class="btn btn-primary">
              <button><a href="{{route('user.subpost', $comment->id)}}">Back</a></button>
            </form>
        </div>
      </div>
  </div>
@endsection  

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection