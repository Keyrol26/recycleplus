@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | InProcess Booking List</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">InProcess Booking!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.table', [
        'title' => 'In-Process Booking Table',
        'tableId' => 'process_table',
        'dataRoute' => route('admin.searchprocess'),
    ])
    @endcomponent
@endsection
