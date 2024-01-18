<!-- resources/views/add-ball.blade.php -->

@extends('layouts.app')

@section('content')

    <h1>Add Ball</h1>

    <form action="{{ url('/add-ball') }}" method="POST">
        @csrf
        <label for="name">Ball Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="volume">Volume (in Inches):</label>
        <input type="number" name="volume" id="volume" required>

        <button type="submit">Add Ball</button>
    </form>

@endsection
