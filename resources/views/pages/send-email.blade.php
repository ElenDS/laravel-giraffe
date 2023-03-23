@extends('layouts.empty')
@section('main')
    <div class="container h-100 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Enter your email</h2>

                        <form action="" method="post">
                            @csrf

                            <div class="form-outline mb-4">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                                <label class="form-label" for="email">Your Email</label>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn-block btn-lg text-light">Send</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
