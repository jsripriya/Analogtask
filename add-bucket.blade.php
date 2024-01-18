@extends('layouts.app')

@section('content')

    <h1>Add Bucket</h1>

    <form action="{{ url('/add-bucket') }}" method="POST">
        @csrf
        <label for="name">Bucket Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="volume">Volume (in Inches):</label>
        <input type="number" name="volume" id="volume" required>

        <button type="submit">Add Bucket</button>
    </form>

@endsection
