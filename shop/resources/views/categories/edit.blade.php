@extends('app')

@section('content')

<div class="col-lg-12">
    @if ($category->exists)
    <h1 class="my-4">Category Edit</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @method("PATCH")
    @else
    <h1 class="my-4">New Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
    
    @endif
        @csrf
        Name:
        <br>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        <br>
        @if ($category->exists)
        <input type="submit" class="btn btn-primary" value="Update">
        @else
        <input type="submit" class="btn btn-primary" value="Save">
        @endif
        <br>
        <br>
    </form>
</div>
@endsection