<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>" type="image/x-icon">
	<title><?php echo $__env->yieldContent('title'); ?> } <?php echo e(get_section_content('project', 'site_title')); ?> </title>
	<?php echo $__env->make('common.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<div id="wrapper">
		<?php echo $__env->make('common.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<?php echo $__env->make('common.admin_logoutbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			<?php echo $__env->yieldContent('content'); ?>
			<?php echo $__env->make('common.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<?php echo $__env->make('common.admin_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\wamp64\www\chatbots\resources\views/admin/admin_app.blade.php ENDPATH**/ ?>