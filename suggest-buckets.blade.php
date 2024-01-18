<!-- resources/views/suggest-buckets.blade.php -->

@extends('layouts.app')

@section('content')

    <h1>Suggest Buckets</h1>

    <form action="{{ url('/suggest-buckets') }}" method="POST">
        @csrf
        <!-- Add input fields for suggesting buckets -->

        <button type="submit">Suggest Buckets</button>
    </form>

@endsection
