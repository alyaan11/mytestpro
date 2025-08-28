@extends('layouts.boilerplate')

@section('content')
        <h1>Accessories</h1>
        <a href="{{ route('accessories.create') }}" class="btn btn-primary mt-4">Create New Accessory</a>
        @include('flash.flashmsgs')

@endsection
