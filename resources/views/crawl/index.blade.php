@extends('_layouts.master')

@section('content')
    <div id="app">
        <app-header></app-header>
        <router-view></router-view>
    </div>
@endsection