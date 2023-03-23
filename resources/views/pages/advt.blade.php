@extends('layouts.main')
@section('main')
    <div class="container h-100 mt-5">
        @can('update', $ad)
            <div class="row w-50">
                <div class="col-3">
                    <a href="/edit/{{$ad->id}}" class="btn btn-outline-info">Edit Ad</a>
                </div>

                <div class="col-3">
                    <a href="/delete/{{$ad->id}}" class="btn btn-outline-info">Delete Ad</a>
                </div>
            </div>
        @endcan
        <h2 class="my-3">{{$ad->title}}</h2>
        <div>
            <h6 class="text-secondary">Ad by <span class="text-info">{{$ad->user->username}}</span></h6>
            <h6 class="text-secondary">Published <span class="text-info">{{$ad->created_at}}</span></h6>
        </div>

        <div class="row">
            <div class="col m-1"><p>{{$ad->description}}</p></div>
        </div>
    </div>
@endsection
