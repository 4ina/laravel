@extends('app')

@section('content')

<div class="col-lg-12">
    <h1 class="my-4">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>$ {{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection