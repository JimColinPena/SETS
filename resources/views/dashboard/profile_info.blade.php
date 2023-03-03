@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')
  <div class="container" style="margin-top: 100px;">
      <h1>Your Profile Information</h1>
      @foreach($info as $infos)
         <h3>Name &nbsp &nbsp: {{$infos->first_name}} {{$infos->middle_name}}. {{$infos->last_name}}</h2>
         <h3>Section  : {{$infos->section}}</h3>
         <h3>Course &nbsp: {{$infos->course}}</h3>
      @endforeach
  </div>
@endsection  

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection


