<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    {{-- <title>Shakil Ahmed | Expert Web Developer in Bangladesh</title> --}}
    <title>@yield('title')</title>
    <!-- <meta name="google-site-verification" content="J2K-awrLm--LtTSkUGmFsRpFFTU0W1V5PqZTQp0b6pg" /> -->

    <meta name="description" content="Shakil Ahmed is an Expert Web Developer in Bangladesh. Expert Web Design in Bangladesh, Expert Programmer in Bangladesh. He is highly talented, experienced, professional and cooperative software engineer, working in programming and web world for more than 2 years. Moreover Shakil Ahmed has a skilled to assure you a wide range of quality IT services. ">

    <meta name="keywords" content="Expert Web Developer in Bangladesh, Expert Web Design in Bangladesh, Expert Programmer in Bangladesh">
    <link rel="shortcut icon" href="{{asset('images/Shakil Ahmed.ico')}}" type="image/x-icon">

    <meta name="author" content="Shakil Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" >
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" >
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" >
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
</head>
<body>

@include('Layout.menu')


@yield('content')




@include('Layout.footer')

<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

</body>
</html>
