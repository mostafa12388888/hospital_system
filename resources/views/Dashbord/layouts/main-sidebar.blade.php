<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashbord/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashbord/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashbord/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashbord/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
		@if(\Auth::guard('admin')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-admin')
		@elseif(\Auth::guard('doctor')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-doctor')
		@elseif(\Auth::guard('doctor')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-doctor')
		@elseif(\Auth::guard('rayemployee')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-rayemployee')
		@elseif(\Auth::guard('Patient')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-web')
		@elseif(\Auth::guard('laboratorEmploye')->check())
		@include('Dashbord.layouts.main-sidebar.main-sidebar-laboratoryemployee')
		@endif
		</aside>
<!-- main-sidebar -->
