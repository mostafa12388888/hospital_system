@extends('Dashbord.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashbord/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
<style>
	.panaled {
display: none;
	}
</style>
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashbord/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashbord/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{trans('Dashbord/login_trans.Welcome')}}!</h2>
											
														<h5 class="font-weight-semibold mb-4">	@if($errors->any())
																							@foreach ($errors->all() as $error)
																								<div style="color:red">{{ $error }}</div>
																							@endforeach
																						@endif</h5>
													
											
												<br>
												<h5>{{trans('Dashbord/login_trans.Choose_list')}}</h5>
											<select class="form-select" id="selected_from_menu" aria-label="Default select example">
  <option selected disabled>{{trans('Dashbord/login_trans.Select_Enter')}}</option>
  <option value="Patient">{{trans('Dashbord/login_trans.user')}}</option>
  <option value="admin">{{trans('Dashbord/login_trans.admin')}}</option>
  <option value="doctor">{{trans('Dashbord/login_trans.doctor')}}</option>
  <option value="rayemployee">{{trans('Dashbord/login_trans.rayemployee')}}</option>
  <option value="laboratorEmploye">{{trans('Dashbord/login_trans.laboratorEmploye')}}</option>
  
</select>
<div class="panaled">
												<form method="post" class="formadminanduser" action="" >
												@csrf	
												<div class="form-group">
														<label>{{trans('Dashbord/login_trans.email')}}</label> <input class="form-control" name="email" placeholder="Enter your email" type="email" :value="old('email')">
													</div>
													<div class="form-group">
														<label>{{trans('Dashbord/login_trans.password')}}</label> <input class="form-control" name="password" placeholder="Enter your password" type="password" autocomplete="current-password">
													</div><button class="btn btn-main-primary btn-block"  type="submit">Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												
												<div class="main-signin-footer mt-5">
													<p><a href="">Forgot password?</a></p>
													<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
	$('#selected_from_menu').on(
		'change',function(){
		$('.panaled').show(100);
var el=document.querySelector(".formadminanduser");
		if(this.value==='Patient'){
			el.setAttribute("action","{{route('Patient.login')}}");
			// $('form[class="formadminanduser"]').removeAttribute("action");
		}else if(this.value==='doctor'){
			el.setAttribute("action","{{route('doctor.login')}}")
			
		}else if(this.value==='rayemployee'){
			el.setAttribute("action","{{route('rayemployee.login')}}")
		}else if(this.value==='laboratorEmploye'){
			el.setAttribute("action","{{route('laboratorEmploye.login')}}")
			
		}else{
			
			el.setAttribute("action","{{route('admin.login')}}");
			// console.log("admin");
			// $('form[class="formadminanduser"]').removeAttribute("action").setAttribute("action","http://127.0.0.1:8000/admin/login");
		}
		console.log(el);	
	})
</script>
@endsection