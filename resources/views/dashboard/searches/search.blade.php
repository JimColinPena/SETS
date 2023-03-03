@extends('layouts.master')
@section('title')
  Dictionary
@endsection
@section('content')

    <div class="container" style="margin-top: 100px;">
        {{-- {{$searchResults->links()}} --}}
            <nav class="navbar2 navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline" method="POST" role="search" action="{{route('search')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
            <a href="{{route('search.back')}}" class="btn-success"><button class="btn btn-warning">Back</button></a>
        </nav>

        @foreach($searchResults as $searchResult)
                <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
        @endforeach
    </div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection