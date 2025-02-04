@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Collector Availability Monthly</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Collector Availability Monthly!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @component('components.collector-table', [
        'title' => 'Collector List Table',
        'tableId' => 'collecter_table',
        'dataRoute' => route('admin.searchcollector'),
    ])
    @endcomponent
@endsection

