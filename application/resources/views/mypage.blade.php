@extends('header')
@extends('footer')

@section('teste')
    <h1>WELCOME TO MY WEBPAGE</h1>
    <h2>Customers</h2>
    @foreach($customers as $customer)
        <p>{{ $customer->name}} </br> </p>
    @endforeach
@stop

@section('ft')
@stop



