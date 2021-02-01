@extends('Layout.app')

@section('title', "Home")

@section('content')
    @include('Component.homeBanner')
    @include('Component.homeService')
    @include('Component.homeCourse')
    @include('Component.homeProject')
    @include('Component.homeContact')
    @include('Component.homeReview')
@endsection
