@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | OnTheWay Booking List</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">OnTheWay Booking!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'OnTheWay Booking Table',
        'tableId' => 'otw_table',
        'dataRoute' => route('collector.searchotw'),
    ])
    @endcomponent
@endsection
