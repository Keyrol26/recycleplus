@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Booking History List</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Booking History!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'Booking History Table',
        'tableId' => 'history_table',
        'dataRoute' => route('collector.searchhistory'),
    ])
    @endcomponent
@endsection
