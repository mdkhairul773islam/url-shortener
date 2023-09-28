@extends('layouts.app')

@section('content')
<div class="container">
    <h1>URL Statistics</h1>
    <p>Original URL: <a href="{{ $url->long_url }}" target="_blank">{{ $url->long_url }}</a></p>
    <p>Short URL: <a href="{{ route('redirect', ['shortUrl' => $url->short_url]) }}" target="_blank">{{
            route('redirect', ['shortUrl' => $url->short_url]) }}</a></p>
    <p>Click Count: {{ $url->click_count }}</p>
</div>
@endsection