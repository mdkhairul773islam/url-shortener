@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">URL Shortener</h1>
    <form method="POST" action="{{ route('shorten') }}">
        @csrf
        <div class="form-group">
            <label class="mb-2" for="url">Long URL</label>
            <input type="url" class="form-control" id="url" name="url" placeholder="Enter a long URL" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Shorten URL</button>
    </form>
</div>
@endsection