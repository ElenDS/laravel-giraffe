@extends('layouts.main')
@section('main')
    <div class="container h-100 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Create an Ad</h2>

                        <form action="" method="post">
                            @csrf
                            <div class="form-outline mb-4">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                                <input type="text" id="title" name="title" class="form-control form-control-lg" required autofocus/>
                                <label class="form-label" for="title">Ad Title</label>
                            </div>

                            <div class="form-outline mb-4">
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                                <textarea type="text" id="description" name="description" class="form-control form-control-lg" required></textarea>
                                <label class="form-label" for="description">Ad Description</label>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn-block btn-lg text-light">Create</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
