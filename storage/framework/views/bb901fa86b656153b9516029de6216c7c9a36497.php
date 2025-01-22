
<?php $__env->startSection('title', 'Add Question'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2>Questions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(url('admin/dashboard')); ?>" title="Dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(url('admin/questions')); ?>" title="Questions"><strong>Questions</strong></a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(url('admin/questions/create')); ?>" title="Add New Question"><strong>Add New Question</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary t_m_25" href="<?php echo e(url('admin/questions')); ?>" title="Back To Questions">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Questions
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Question Details</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" id="add_form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <strong>Question</strong>
                                    <textarea class="form-control" name="question" placeholder="Question" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Question Type</strong>
                                    <select class="form-control" name="type" id="type">
                                        <option value="1">Radio Button</option>
                                        <option value="2">Input Field</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Order</strong>
                                    <input type="number" class="form-control only_numbers" name="order" id="order">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Status</strong>
                                    <br>
                                    <label>
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="status" value="1" checked>
                                        </div> Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="question_anwers">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Multiple Choice<sup class="red">*</sup></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_choices">
                                        <tr>
                                            <td>
                                                <input type="text" name="answers[0][choice]" class="form-control">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-circle" id="add_click" type="button"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-white cancel_btn" data-url="<?php echo e(url('admin/questions')); ?>">Cancel</button>
                                <button type="button" class="btn btn-primary" id="btn_save">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    $(document).ready(function () {
        $('#type').change(function () {
            var selectedValue = $(this).val();
            if(selectedValue == 1){
                $('#question_anwers').show();
            }else{
                $('#question_anwers').hide();
            }
        });
    });

    $(document).ready(function(){
        var i = 1;
        var counter = 1;
        $('#add_click').click(function(e){
            var rand_num = Math.floor(10 + (Math.random() * (1000 - 10 + 1)));
            var row_append = '<tr class="append_answers">';
            row_append += '<td><input type="text" name="answers['+counter+'][choice]" class="form-control"></td>';
            row_append += '<td> <button class="btn btn-danger btn-circle remove_answer" type="button"><i class="fa fa-minus"></i></button> </td></tr>';
            counter++;
            $("#add_choices").append(row_append);
            remove_answer(rand_num);
        });
        function remove_answer(rand_num){
            $('.remove_answer').click(function(){
                $(this).closest('.append_answers').remove();
            });
        }
        remove_answer();
    });
    $(document).on("click" , "#btn_save" , function() {
        var btn = $(this).ladda();
        btn.ladda('start');
        var formData =  new FormData($("#add_form")[0]);
        $.ajax({
            url:"<?php echo e(url('admin/questions/store')); ?>",
            type: 'POST',
            data: formData,
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false,
            success:function(status){
                if(status.msg=='success') {
                    toastr.success(status.response,"Success");
                    $('#add_form')[0].reset();
                    setTimeout(function(){
                        location.reload(true);
                    }, 200);
                } else if(status.msg == 'error') {
                    btn.ladda('stop');
                    toastr.error(status.response,"Error");
                } else if(status.msg == 'lvl_error') {
                    btn.ladda('stop');
                    var message = "";
                    $.each(status.response, function (key, value) {
                        message += value+"<br>";
                    });
                    toastr.error(message, "Error");
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\chatbots\resources\views/admin/questions/add_question.blade.php ENDPATH**/ ?>