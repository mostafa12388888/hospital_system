<title>@yield('title')</title>
@yield('css')
@livewireStyles






<link href="{{URL::asset('Dashbord/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashbord/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashbord/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashbord/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashbord/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashbord/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    {{-- <link href="{{URL::asset('Dashbord/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/> --}}
    {{-- <link href="{{URL::asset('css/app.css')}}" rel="stylesheet"/> --}}





@if(App::getLocale()=="ar")

<link rel="icon" href="{{URL::asset('Dashbord/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('Dashbord/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('Dashbord/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('Dashbord/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('Dashbord/css-rtl/sidemenu.css')}}">
<!--- Style css -->
<link href="{{URL::asset('Dashbord/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('Dashbord/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('Dashbord/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else

<!-- Favicon -->
<link rel="icon" href="{{URL::asset('Dashbord/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('Dashbord/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('Dashbord/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Right-sidemenu css -->
<link href="{{URL::asset('Dashbord/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('Dashbord/css/sidemenu.css')}}">

<!-- Maps css -->
<link href="{{URL::asset('Dashbord/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<!-- style css -->
<link href="{{URL::asset('Dashbord/css/style.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashbord/css/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('Dashbord/css/skin-modes.css')}}" rel="stylesheet" />
@endif
