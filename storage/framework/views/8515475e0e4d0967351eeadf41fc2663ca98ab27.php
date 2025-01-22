<?php $__env->startSection('title', 'Questions'); ?>
<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-8 col-sm-8 col-xs-8">
		<h2>Manage Questions</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo e(url('admin/dashboard')); ?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">
				<a href="<?php echo e(url('admin/questions')); ?>"><strong>Manage Questions</strong></a>
			</li>
		</ol>
	</div>
	<div class="col-lg-4 col-sm-4 col-xs-4 text-right">
		<a class="btn btn-primary t_m_25" href="<?php echo e(url('admin/questions/create')); ?>" title="Add New Question">
			<i class="fa fa-plus" aria-hidden="true"></i> Add New Question
		</a>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					<form id="search_form" action="<?php echo e(url('admin/questions')); ?>" method="GET">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-3">
								<div class="form-group">
									<select class="form-control" name="type" id="type">
										<option value="">Select Type</option>
										<option value="1" <?php echo e(isset($filters['type']) && $filters['type'] === '1' ? 'selected' : ''); ?>>Radio Button</option>
										<option value="2" <?php echo e(isset($filters['type']) && $filters['type'] === '2' ? 'selected' : ''); ?>>Input Field</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="search_query" placeholder="Search by question..." value="<?php echo e(old('search_query', $filters['search_query'] ?? '')); ?>">
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
								<?php ($i = 1); ?>
								<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="tr">
									<td><?php echo e($i++); ?></td>
									<td>
										<?php echo e($item->question); ?>

									</td>
									<td>
										<?php if($item->type == 1): ?>
										<label class="label label-primary">Radio Button</label>
										<?php else: ?>
										<label class="label label-success">Input Field</label>
										<?php endif; ?>
									</td>
									<td><?php echo e($item->order); ?></td>
									<td>
										<?php if($item->status == 1): ?>
										<label class="label label-primary">Active</label>
										<?php else: ?>
										<label class="label label-danger">Inactive</label>
										<?php endif; ?>
									</td>
									<td><?php echo e(date_formated($item->created_at)); ?></td>
									<td class="">
										<a href="<?php echo e(url('admin/questions/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success btn-sm" data-placement="top" title="Edit">Edit</a>
										<button class="btn btn-sm btn-primary btn_view" title="Details" data-id="<?php echo e($item->id); ?>" data-placement="top" type="button">Details</button>
										<button class="btn btn-sm btn-danger btn_delete" title="Delete" data-id="<?php echo e($item->id); ?>" data-placement="top" type="button">Delete</button>
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-9">
							<p>Showing <?php echo e($questions->firstItem()); ?> to <?php echo e($questions->lastItem()); ?> of <?php echo e($questions->total()); ?> entries</p>
						</div>
						<div class="col-md-3 text-right">
							<?php echo e($questions->links('pagination::bootstrap-4')); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
					url:"<?php echo e(url('admin/questions/delete')); ?>",
					type:'post',
					data:{"_token": "<?php echo e(csrf_token()); ?>", 'id': id},
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\chatbots\resources\views/admin/questions/manage_questions.blade.php ENDPATH**/ ?>