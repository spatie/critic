@extends('_layouts.master')

@section('content')

    @javascript(compact('pusherKey', 'pusherCluster'))

    <div id="app">
        <app-header></app-header>
        <router-view></router-view>
    </div>
@endsection