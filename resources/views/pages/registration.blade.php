@extends('layouts.empty')
@section('main')
    <div class="container h-100 mt-5">
        @if(session()->get('message'))
            <div class="alert alert-danger m-3">
                {{session()->get('message')}}
            </div>
        @endif
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                        <form action="" method="post">
                            @csrf
                            <div class="form-outline mb-4">
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                                <input type="text" id="username" name="username" class="form-control form-control-lg" required autofocus/>
                                <label class="form-label" for="username">Your Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                                <label class="form-label" for="email">Your Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn-block btn-lg text-light">Register</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
