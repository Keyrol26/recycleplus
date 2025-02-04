@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | On-The-Way Booking List</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">On-The-Way Booking!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'On-The-Way Booking Table',
        'tableId' => 'otw_table',
        'dataRoute' => route('admin.searchotw'),
    ])
    @endcomponent
@endsection
