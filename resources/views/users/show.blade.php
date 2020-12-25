@extends('layouts.app')

@section('content')

    <h1>{{ $user->name }}</h1>
    
    <ul class="nav nav-tabs nav-justified mt-5 mb-2">
        <li class="nav-item nav-link {{ Request::is('users/' .$user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">動画<br><div class="badge badge-secondary">{{ $count_movies }}</div></a></li>
        <li class="nav-item nav-link"><a href="" class="">フォロワー<br><div class="badge badge-secondary"></div></a></li>
        <li class="nav-item nav-link"><a href="" class="">フォロー中<br><div class="badge badge-secondary"></div></a></li>
    </ul>

@include('movies.movies', ['movies' => $movies])

@endsection
