@extends('layouts.empty')
@section('main')
    <div class="container h-100 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Enter new password</h2>

                        <form action="/reset-password" method="post">
                            @csrf
                            <input name="email" value="{{$email}}" type="hidden">

                            <div class="form-outline mb-4">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <input pattern="\d{6}" type="password" id="password" name="password" class="form-control form-control-lg" required/>
                                <label class="form-label" for="password">Password</label>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn-block btn-lg text-light">Reset Password</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
