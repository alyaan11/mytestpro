@extends('layouts.boilerplate')

@section('content')


        <h1>{{ __('All Products') }}</h1>
        <div class="mt-4">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">{{ __('Create Product') }}</a>
        </div>

        <h6 class="">User-Name: {{ auth()->user()->name }}</h6>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('description') }}</th>
                    <th>{{ __('price') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('category_name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->img)
                                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" width="100">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->category_name }}</td>
                        <td>
                            @can('update', $product)
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                            @else
                                <button class="btn btn-sm transparent-btn" disabled>{{ __('Edit') }}</button>
                            @endcan


                            @can('delete', $product)
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                                </form>
                            @else
                                <button type="submit" class="btn btn-sm transparent-btn" disabled>{{ __('Delete') }}</button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- testing fresh branch  --}}
    @endsection
