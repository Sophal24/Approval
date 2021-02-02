@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($data as $item)
            <p>{{ $item->id }} {{ $item->title }} {{ $item->body }}</p>
        @endforeach
    </div>
@endsection
