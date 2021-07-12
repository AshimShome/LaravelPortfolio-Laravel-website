@extends('Layout.app')
@section('title')
    Home
@endsection

@section('content')
    @include('Component.homeBaner')

    @include('Component.homeService')
    @include('Component.homeCourse')

    @include('Component.homeProject')


    @include('Component.homeContact')
    @include('Component.homeReview')


@endsection
