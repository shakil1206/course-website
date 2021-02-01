@extends('Layout.app')
@section('title',"Dashboard")

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalVisitor}}</div>
                    <div class="count-card-text">Total Visitor</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalService}}</div>
                    <div class="count-card-text">Total Services</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalCourse}}</div>
                    <div class="count-card-text">Total Courses</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalProject}}</div>
                    <div class="count-card-text">Total Project</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalContact}}</div>
                    <div class="count-card-text">Total Contact</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="count-card-title">{{$totalReview}}</div>
                    <div class="count-card-text">Total Review</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
