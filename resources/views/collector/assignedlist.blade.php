@extends('layouts.master')
@section('tittle')
    @if (Route::is('assignedbookingfor'))
        <title>RecyclePlus | Booking Assigned for {{$colldata->user->name}} List</title>
    @else
        <title>RecyclePlus | Collector Assigned List</title>
    @endif
@endsection
@section('nav-head')
    <div>
        @if (Route::is('assignedbookingfor'))
            <h1 class="m-0">Assigned Booking for {{ $colldata->user->name}}!</h1>
        @else
            <h1 class="m-0">Assigned Booking!</h1>
        @endif
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @if (Route::is('assignedbookingfor'))
        @component('components.table', [
            'title' => 'Assigned Booking Table',
            'tableId' => 'asssignedfor_table',
            'dataRoute' => route('assignedbookingforsearch', [$colldata->id]),
        ])
        @endcomponent
    @else
        @component('components.table', [
            'title' => 'Assigned Booking Table',
            'tableId' => 'asssigned_table',
            'dataRoute' => route('collector.searchassigned'),
        ])
        @endcomponent
    @endif
@endsection
