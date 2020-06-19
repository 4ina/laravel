@extends('app')

@section('content')

<div class="col-lg-12">
    <h1 class="my-4">Product Edit</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @method("PATCH")
        @csrf

        Name:
        <br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
        <br>

        Price ($):
        <br>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control">
        <br>

        Description:
        <br>
        <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        <br>

        Category:
        <br>
        <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <br>

        <input type="file" name="photo">
        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Save">
        <br>
        <br>
    </form>
</div>
@endsection