@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}">
        <button type="submit">Update</button>
    </form>
@endsection