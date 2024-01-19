<!-- resources/views/suggest-buckets.blade.php -->

@extends('layouts.app')

@section('content')

    <h1>Suggest Buckets</h1>

    <form action="{{ url('/suggest-buckets') }}" method="POST">
        @csrf

        <label for="pink">PINK:</label>
        <input type="number" name="PINK" id="pink" required>

        <label for="red">RED:</label>
        <input type="number" name="RED" id="red" required>

        <label for="blue">BLUE:</label>
        <input type="number" name="BLUE" id="blue" required>

        <label for="orange">ORANGE:</label>
        <input type="number" name="ORANGE" id="orange" required>

        <label for="green">GREEN:</label>
        <input type="number" name="GREEN" id="green" required>

        <button type="submit">Suggest Buckets</button>
    </form>

@endsection
