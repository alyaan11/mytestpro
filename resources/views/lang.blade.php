
@extends('layouts.boilerplate')

@section('content')
<style>
    .background-black{
        background-color: rgb(2, 0, 14);
    }
</style>

    <h1 class="text-green background-black">{{ __('Welcome to the Dashboard') }}</h1>

    <h1>{{ __('Change the language') }}</h1>
    <ul>
        <li><a href="{{ url('lang/en') }}">{{ __('English') }}</a></li>
        <li><a href="{{ url('lang/ur') }}">{{ __('اردو') }}</a></li>
        <li><a href="{{ url('lang/chinese') }}">{{ __('Chinese') }}</a></li>
    </ul>
@endsection

