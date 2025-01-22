@extends('admin.admin_app')
@section('title') {{'Dashboard'}} @endsection
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
	<div class="row">
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5 >Attribute</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">100</h1><small>Attributes</small>
					<div class="stat-percent font-bold text-primary"><span class="label label-primary " title="View">View</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection