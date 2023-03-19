@extends('layouts.main')
@section('main')

    @if(session()->has('message'))
        <div class="alert alert-success m-3">
            {{session('message')}}
        </div>
    @endif
    <div class="container">
        @foreach($ads as $ad)

            <div class="text text-2 p-4">
                @can('update', $ad)
                    <div class="row w-50">
                        <div class="col-3">
                            <a href="/edit/{{$ad->id}}" class="btn btn-outline-info">Edit Ad</a>
                        </div>

                        <div class="col-3">
                            <form method="post" action="/delete/{{$ad->id}}">
                                <input name="_method" value="delete" type="hidden">
                                @csrf
                                <input name="id" value="{{$ad->id}}" type="hidden">
                                <button type="submit" class="btn btn-outline-info">Delete Ad</button>
                            </form>
                        </div>
                    </div>
                @endcan
                <h2 class="my-3">{{$ad->title}}</h2>
                <div>
                    <p class="fs-4 text-secondary">category: {{$ad->user->username}}</p>
                </div>

                <div class="row">
                    <div class="col m-1"><p>{{$ad->description}}</p></div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="m-4 btn btn-info" href="">Create Ad</a>
@endsection
