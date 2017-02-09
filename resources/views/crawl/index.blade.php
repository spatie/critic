@extends('_layouts.master')

@section('content')

    @javascript(compact('pusherKey'))

    <div id="app">
        <app-header></app-header>
        <router-view></router-view>
    </div>
@endsection