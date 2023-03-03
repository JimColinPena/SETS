@extends('layouts.master2')
@section('title')
    Login
@endsection
@section('styles')
    <link href="css/app.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header" style="background: linear-gradient(to right, #7362ff, #f606cd);"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <form class="" action="{{ route('user.signin') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-floating mb-3">
                                    <label for="email">Email: </label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="password">Password: </label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="password.html">Forgot Password?</a>
                                    <input type="submit" value="Sign In" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route('user.signup') }}">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection   


