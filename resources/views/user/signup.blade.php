@extends('layouts.master2')
@section('title')
    Register
@endsection
@section('styles')
    <link href="css/app.css" rel="stylesheet" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
@endsection

@section('content')
     <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 150px;">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                   @if (count($errors) > 0)
                           <div class="alert alert-danger">
                               @foreach ($errors->all() as $error)
                                   <p>{{ $error }}</p>
                               @endforeach
                           </div>
                   @endif
                    <div class="card-body">
                       <form class="" action="{{ route('user.signup') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                      <label for="fname">First Name: </label>
                                     <input type="text" name="fname" id="fname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <label for="lname">Last Name: </label>
                                    <input type="text" name="lname" id="lname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-floating">
                                   <label for="mname">Middle Initial: </label>
                                   <input type="text" name="mname" id="mname" class="form-control">
                                 </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                               <label for="email">Email: </label>
                               <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="row mb-3">
                             <div class="col-md-6">
                                <div class="form-floating">
                                   <label for="section">Section: </label>
                                   <input type="text" name="section" id="section" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="course">Course: </label>
                                    <input type="text" name="course" id="course" class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                       <label for="password">Password: </label>
                                       <input type="text" name="password" id="password" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="password">Confirm Password: </label>
                                        <input type="text" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <input type="submit" value="Sign Up" class="btn btn-primary">
                            </div>
                        </form>
                        <div class="card-footer text-center py-3">
                            <div class="small"> <a href="{{ route('user.signin') }}">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@endsection