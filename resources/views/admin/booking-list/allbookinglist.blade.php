@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | All Booking List</title>
@endsection
@section('nav-head')
<div>
    <h1 class="m-0">All Booking!</h1>
    <p class="m-0">We are on a mission to help households like you build a greener world.</p>
</div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'All Booking Table',
        'tableId' => 'all_table',
        'dataRoute' => route('admin.searchall')
    ])
    @endcomponent
@endsection



