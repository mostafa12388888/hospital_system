@extends('Dashbord.layouts.master')
@section('css')
<link href="{{URL::asset('Dashbord/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashbord/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashbord/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashbord/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashbord/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashbord/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- notifie like for message laybrare -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
		@include('Dashbord.Messages.messages_alert')		
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								{{trans('Dashbord/Section/SectionTable_Trans.add_section')}}
</button>
@include('Dashbord.Sections.modela_addsection')
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{trans('Dashbord/Section/SectionTable_Trans.section_name')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('Dashbord/Section/SectionTable_Trans.description_section')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('Dashbord/Section/SectionTable_Trans.add_date')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('Dashbord/Section/SectionTable_Trans.operation')}} </th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($section as $index => $section)
											<tr>
												<td>{{$index+1}}</td>
												<td><a href="{{route('Sections_admin.show',$section->id)}}">{{$section->name}}</a></td>
												<td>{{\Str::limit($section->description,60)}}</td>
												<td>{{$section->created_at->diffForHumans()}}</td>
												<td>
                                                       <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$section->id}}"><i class="las la-pen"></i></a>
                                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$section->id}}"><i class="las la-trash"></i></a>
                                                   </td>
												
											</tr>
											@include('Dashbord.Sections.update')
											@include('Dashbord.Sections.delete')
											@endforeach
											

											
											

											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<!--div-->
					
					<!--/div-->

					<!--div-->
					
					<!--/div-->

					<!--div-->
					
				</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{URL::asset('Dashbord/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashbord/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('Dashbord/js/table-data.js')}}"></script>

<!-- notifie like for message laybrare -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection