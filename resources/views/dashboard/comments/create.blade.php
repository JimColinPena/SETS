@extends('layouts.master')
@section('title')
    Add Post
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-12 col-md-offset-4">
        <form class="" action="{{ route('user.addposts') }}" method="post">
            {{ csrf_field() }}
            {{-- <div class="row"> --}}
                <div class="form-group  col-md-8">
                    <label for="mytext">Text</label>
                    <textarea rows="6" cols="50" name="mytext" id="mytext" class="form-control"></textarea>
                    {{-- <input type="textarea" name="mytext" id="mytext" class="form-control"> --}}
                </div>
            {{-- </div> --}}
              <input type="submit" value="Add Post" class="btn btn-primary">
              <button><a href="{{route('user.post')}}">Back</a></button>
              
            </form>
        </div>
      </div>
  </div>
@endsection  

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection