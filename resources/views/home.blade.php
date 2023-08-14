@extends('layouts.app')

@section('title', 'Landing Page - KelasMaju')

@section("content")
<h1>INI MAU DIBUAT UNTUK LANDING PAGE</h1>
@if (Auth::user())
    <a href="{{route("dashboard")}}">{{Auth::user()->name}}</a>
@else
    <a href="{{route("login")}}">LOGIN</a>
@endif
@endsection