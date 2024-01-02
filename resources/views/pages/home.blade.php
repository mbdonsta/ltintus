@extends('layouts.app')

@section('content')
    <div class="container mx-auto h-screen flex justify-center items-center">
        <url-shortener shorten-url-route="{{ route('links.post') }}"></url-shortener>
    </div>
@endsection
