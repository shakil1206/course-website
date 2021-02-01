
@extends('Layout.app')


@section('title', "Contact")


@section('content')

<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            {{-- <img class=" page-top-img fadeIn" src="images/code.svg"> --}}
            <h1 class="page-top-title mt-3">--  যোগাযোগ করুন --</h1>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 map-view">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8674.350948561378!2d90.27184152923334!3d23.92097059398569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDU1JzMxLjkiTiA5MMKwMTYnNDAuNCJF!5e0!3m2!1sen!2sbd!4v1611726938279!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-12 col-md-6">
            <h5 class="service-card-title text-center pb-2">যোগাযোগ করুন
            </h5>
            <div class="form-group ">
                <input id="contactNameId" type="text" class="form-control w-100" placeholder="আপনার নাম">
            </div>
            <div class="form-group">
                <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
            </div>
            <div class="form-group">
                <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="ইমেইল ">
            </div>
            <div class="form-group">
                <input id="contactMsgId" type="text" class="form-control  w-100" placeholder="মেসেজ ">
            </div>
            <button id="contactSendBtnId" type="submit" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন
            </button>
        </div>
    </div>
</div>



@endsection
