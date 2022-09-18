<!-- Title -->
<title> @yield('title')</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('dashboard/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Right-sidemenu css -->
<link href="{{URL::asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Maps css -->
<link href="{{URL::asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@yield('css')

@if(App::getLocale()=='ar')
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/css/sidemenu.css')}}">

    <!-- style css -->
    <link href="{{URL::asset('dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/css/skin-modes.css')}}" rel="stylesheet" />
@endif
