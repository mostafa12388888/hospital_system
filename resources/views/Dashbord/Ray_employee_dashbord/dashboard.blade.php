@extends('Dashbord.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashbord/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashbord/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">لوحه تحكم موظفين الاشعه</h2><br/>
						  <p class="mg-b-0">مرحبا بك يا {{\Auth::user()->name}}</p>
						</div>
					</div>
				
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي عدد الفواتير</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Ray::count()}}</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> +427</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي عدد الفواتير المكتمله</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Ray::where('case',1)->count()}}</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -23.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي عدد الفواتير تحت الاجراء</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Ray::where('case',0)->count()}}</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 52.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
				
				</div>
				<!-- row closed -->

			

			

				<!-- row opened -->
				<div class="row row-sm row-deck">
					
					<div class="col-md-12 col-lg-8 col-xl-12">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">احدث خمس معاملات علي الاشعه</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">#</th>
											<th class="wd-lg-25p">تاريخ الفاتوره</th>
											<th class="wd-lg-25p tx-right">اسم الطبيب</th>
											<th class="wd-lg-25p tx-right">اسم المريض</th>
											<th class="wd-lg-25p tx-right">المطلوب</th>
											<th class="wd-lg-25p tx-right">حاله الفاتوره</th>
										</tr>
									</thead>
									<tbody>
										@forelse(\App\Models\Ray::latest()->take(5)->get() As $value)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $value->created_at}}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $value->doctor->name}}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $value->patient->name}}</td>
											<td class="tx-right tx-medium tx-danger">{{ $value->description}}</td>
										@if($value->case)
										<td class="text-success">مكتمله</td>
										@else
										<td class="text-danger">تحت الاجراء</td>
										@endif
										</tr>
										@empty
										لا توجد بينات 
										@endforelse
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('Dashbord/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashbord/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('Dashbord/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('Dashbord/js/Dashbord.sampledata.js')}}"></script>
<script src="{{URL::asset('Dashbord/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('Dashbord/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('Dashbord/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('Dashbord/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('Dashbord/js/index.js')}}"></script>
<script src="{{URL::asset('Dashbord/js/jquery.vmap.sampledata.js')}}"></script>
@endsection