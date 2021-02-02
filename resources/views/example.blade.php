@extends('layouts.example')

@section('example')
    <form action="#">
        <label for="username">Username</label>
        <input type="text">
        <label for="password">Password</label>
        <input type="password">
        <button type="submit">submit</button>
    </form>
@endsection