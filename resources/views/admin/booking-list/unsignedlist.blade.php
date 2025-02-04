@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Collector Assigned List</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Unsigned Collector Booking!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'Unsigned Collector Booking Table',
        'tableId' => 'unsigned_table',
        'dataRoute' => route('admin.searchunsigned'),
    ])
    @endcomponent
@endsection
