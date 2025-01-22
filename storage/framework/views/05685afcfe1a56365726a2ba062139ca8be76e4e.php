<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 50px;" src="<?php echo e(asset('admin_assets/img/profile_small.jpg')); ?>"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Welcome <?php echo e(ucwords(Auth::guard('admin')->user()->username)); ?></span>
                        <span class="text-muted text-xs block">
                            <?php echo e(get_section_content('project', 'site_title')); ?>

                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    <?php echo e(ucwords(Auth::guard('admin')->user()->username)); ?>

                    <span class="text-muted text-xs block">
                        <?php echo e(get_section_content('project', 'short_site_title')); ?>

                    </span>
                </div>
            </li>
            

            <li class="<?php echo e(Request::is('admin/questions', 'admin/questions/add', 'admin/questions/edit', 'admin/questions*') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/questions')); ?>"><i class="fa fa-product-hunt"></i><span class="nav-label">Questions</span></a>
            </li>
        </ul>
    </div>
</nav><?php /**PATH D:\wamp64\www\chatbots\resources\views/common/admin_sidebar.blade.php ENDPATH**/ ?>