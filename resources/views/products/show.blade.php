<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product Details</h1>
    {{ dd($product) }}
    @if ($product)
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        {{-- <p>Category: {{ $product->category->name }}</p> --}}
    @else
        <p>No product found.</p>
    @endif



</body>
</html>
