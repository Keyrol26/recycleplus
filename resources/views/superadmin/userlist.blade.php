@extends('layouts.master')
@section('tittle')
    @if (Route::is('superadminlist'))
        <title>RecyclePlus | Superadmin</title>
    @elseif (Route::is('adminlist'))
        <title>RecyclePlus | Admin</title>
    @elseif (Route::is('sp.collectorlist'))
        <title>RecyclePlus | Collector</title>
    @elseif (Route::is('clientlist'))
        <title>RecyclePlus | Client</title>
    @endif
@endsection
@section('nav-head')
    <div>
        @if (Route::is('superadminlist'))
            <h1 class="m-0">Superadmin List!</h1>
        @elseif (Route::is('adminlist'))
            <h1 class="m-0">Admin List!</h1>
        @elseif (Route::is('sp.collectorlist'))
            <h1 class="m-0">Collector List!</h1>
        @elseif (Route::is('clientlist'))
            <h1 class="m-0">Client List!</h1>
        @endif
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    @if (Route::is('superadminlist'))
        @component('components.user-table', [
            'title' => 'Superadmin Table',
            'tableId' => 'otw_table',
            'dataRoute' => route('searchsuperadminlist'),
        ])
        @endcomponent
    @elseif (Route::is('adminlist'))
        @component('components.user-table', [
            'title' => 'Admin Table',
            'tableId' => 'otw_table',
            'dataRoute' => route('searchadminlist'),
        ])
        @endcomponent
    @elseif (Route::is('sp.collectorlist'))
        @component('components.user-table', [
            'title' => 'Collector Table',
            'tableId' => 'otw_table',
            'dataRoute' => route('sp.searchcollectorlist'),
        ])
        @endcomponent
    @elseif (Route::is('clientlist'))
        @component('components.user-table', [
            'title' => 'Client Table',
            'tableId' => 'otw_table',
            'dataRoute' => route('searchclientlist'),
        ])
        @endcomponent
    @endif
@endsection
