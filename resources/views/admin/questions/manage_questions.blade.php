@extends('admin.admin_app')
@section('title', 'Questions')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-8 col-sm-8 col-xs-8">
		<h2>Manage Questions</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('admin/dashboard') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">
				<a href="{{ url('admin/questions') }}"><strong>Manage Questions</strong></a>
			</li>
		</ol>
	</div>
	<div class="col-lg-4 col-sm-4 col-xs-4 text-right">
		<a class="btn btn-primary t_m_25" href="{{ url('admin/questions/create') }}" title="Add New Question">
			<i class="fa fa-plus" aria-hidden="true"></i> Add New Question
		</a>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					<form id="search_form" action="{{ url('admin/questions') }}" method="GET">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-3">
								<div class="form-group">
									<select class="form-control" name="type" id="type">
										<option value="">Select Type</option>
										<option value="1" {{ isset($filters['type']) && $filters['type'] === '1' ? 'selected' : '' }}>Radio Button</option>
										<option value="2" {{ isset($filters['type']) && $filters['type'] === '2' ? 'selected' : '' }}>Input Field</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="search_query" placeholder="Search by question..." value="{{ old('search_query', $filters['search_query'] ?? '') }}">
										<span class="input-group-append">
											<button type="submit" class="btn btn-primary">Search</button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table id="table_tbl" class="dataTables-example table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Sr #</th>
									<th>Question</th>
									<th>Type</th>
									<th>Order</th>
									<th>Status</th>
									<th>Created Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php($i = 1)
								@foreach($questions as $item)
								<tr id="tr">
									<td>{{ $i++ }}</td>
									<td>
										{{$item->question}}
									</td>
									<td>
										@if($item->type == 1)
										<label class="label label-primary">Radio Button</label>
										@else
										<label class="label label-success">Input Field</label>
										@endif
									</td>
									<td>{{$item->order}}</td>
									<td>
										@if($item->status == 1)
										<label class="label label-primary">Active</label>
										@else
										<label class="label label-danger">Inactive</label>
										@endif
									</td>
									<td>{{ date_formated($item->created_at) }}</td>
									<td class="">
										<a href="{{ url('admin/questions/edit')}}/{{$item->id}}" class="btn btn-success btn-sm" data-placement="top" title="Edit">Edit</a>
										<button class="btn btn-sm btn-primary btn_view" title="Details" data-id="{{ $item->id }}" data-placement="top" type="button">Details</button>
										<button class="btn btn-sm btn-danger btn_delete" title="Delete" data-id="{{ $item->id }}" data-placement="top" type="button">Delete</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-9">
							<p>Showing {{ $questions->firstItem() }} to {{ $questions->lastItem() }} of {{ $questions->total() }} entries</p>
						</div>
						<div class="col-md-3 text-right">
							{{ $questions->links('pagination::bootstrap-4') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#table_tbl').dataTable({
		"paging": false,
		"searching": false,
		"bInfo": false,
		"responsive": true,
		"columnDefs": [
			{ "responsivePriority": 1, "targets": 0 },
			{ "responsivePriority": 2, "targets": 1 },
			{ "responsivePriority": 3, "targets": -1 },
			{ "responsivePriority": 4, "targets": -2 },
		]
	});

	$(document).on("change" , "#type" , function(){
		$('#search_form').submit();
	});

	$(document).on("click" , ".btn_delete" , function(){
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure?",
			text: "You want to delete this question",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, please!",
			cancelButtonText: "No, cancel please!",
			closeOnConfirm: false,
			closeOnCancel: true
		},
		function(isConfirm) {
			if (isConfirm) {
				$(".confirm").prop("disabled", true);
				$.ajax({
					url:"{{ url('admin/questions/delete') }}",
					type:'post',
					data:{"_token": "{{ csrf_token() }}", 'id': id},
					dataType:'json',
					success:function(status){
						$(".confirm").prop("disabled", false);
						if(status.msg == 'success'){
							swal({title: "Success!", text: status.response, type: "success"},
								function(data){
									location.reload(true);
								});
						} else if(status.msg=='error'){
							swal("Error", status.response, "error");
						}
					}
				});
			} else {
				swal("Cancelled", "", "error");
			}
		});
	});
</script>
@endpush