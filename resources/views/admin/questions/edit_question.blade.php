@extends('admin.admin_app')
@section('title', 'Edit Question')
@section('content')
@push('styles')
@endpush
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2>Questions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}" title="Dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/questions') }}" title="Questions"><strong>Questions</strong></a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ url('admin/questions/create') }}" title="Edit New Question"><strong>Edit New Question</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary t_m_25" href="{{ url('admin/questions') }}" title="Back To Questions">
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
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{$question->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <strong>Question</strong>
                                    <textarea class="form-control" name="question" placeholder="Question" rows="5">{{$question->question}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Question Type</strong>
                                    <select class="form-control" name="type" id="type">
                                        <option value="1" {{$question->type == 1 ? 'selected' : '' }}>Radio Button</option>
                                        <option value="2" {{$question->type == 2 ? 'selected' : '' }}>Input Field</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Order</strong>
                                    <input type="number" class="form-control only_numbers" name="order" id="order" value="{{$question->order}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <strong>Status</strong>
                                    <br>
                                    <label>
                                        <div class="icheckbox_square-green">
                                            <input type="checkbox" class="i-checks" name="status" @if($question->status == 1) checked @endif value="1">
                                        </div> Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-white cancel_btn" data-url="{{ url('admin/questions') }}">Cancel</button>
                                <button type="button" class="btn btn-primary" id="btn_save">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $(document).on("click" , "#btn_save" , function() {
        var btn = $(this).ladda();
        btn.ladda('start');
        var formData =  new FormData($("#add_form")[0]);
        $.ajax({
            url:"{{ url('admin/questions/update') }}",
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
                        window.location.href = "{{ url('admin/questions') }}";
                    }, 2000);
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
@endpush