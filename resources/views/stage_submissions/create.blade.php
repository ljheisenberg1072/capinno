@extends('layouts.app')
@section('title', $campaign_stage->stage_name)

<style>
    input:focus {
        outline: none;
    }
</style>

@section('content')
    <section class="stage_submissions-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('stage_submissions._nav')
                    <div class="row mt-4 mb-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="text-center">{{ $campaign_stage->stage_name }}</h2>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-10 offset-lg-1">
                                        <form action="{{ route('stage_submissions.store', ['campaign' => $campaign->id, 'campaign_stage' => $campaign_stage->id]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="submission-file">
                                            {{ csrf_field() }}
                                            @if(count($settings = $campaign_stage->settings))
                                                @foreach($settings as $setting)
                                                    <div class="form-group row">
                                                        <label for="works_name" class="col-sm-2 col-form-label">{{ $setting->works_name }}：</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="works_name" name="works_name" data-name="{{ $setting->works_name }}" placeholder="{{ $setting->works_name }}">
                                                            <p class="alert-hidden mt-1">@if($errors->has('works_name')) {{ $errors->first('works_name') }}@else请输入{{ $setting->works_name }}@endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="works_description" class="col-sm-2 col-form-label">{{ $setting->works_description }}：</label>
                                                        <div class="col-lg-10">
                                                            <textarea class="form-control" rows="5" id="works_description" name="works_description" data-description="{{ $setting->works_description }}" placeholder="简单阐述一下{{ $setting->works_description }}"></textarea>
                                                            <p class="alert-hidden mt-1">@if($errors->has('works_description')) {{ $errors->first('works_description') }}@else请输入{{ $setting->works_description }}@endif</p>
                                                        </div>
                                                    </div>
                                                    @if($setting->attention)
                                                        <div class="form-group row">
                                                            <label for="attention" class="col-sm-2 col-form-label">{{ $setting->attention }}：</label>
                                                            <div class="col-lg-10">
                                                                <p class="form-control px-0" id="attention" style="border: none;">{{ $campaign_stage->attention }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(count($files = $setting->files))
                                                        <div class="form-group row">
                                                            <label for="attention" class="col-lg-2 col-form-label">提交文件：</label>
                                                            <div class="col-lg-10">
                                                                <div class="row mb-2">
                                                                    <h6><span style="color: #e50012;margin-right: 5px;">*</span>表示为必需上传的文件，其它为非必需上传的文件</h6>
                                                                </div>
                                                                <div class="row">
                                                                    @foreach($files as $k => $file)
                                                                        <div class="col-lg-6 mb-3">
                                                                            <div class="card">
                                                                                <h5 class="card-header">@if($file->is_required)<span style="color: #e50012;margin-right: 5px;">*</span>@endif{{ $file->file_name }}</h5>
                                                                                <div class="card-body my-3">
                                                                                    <div class="btn btn-success btn-sm float-right btn-upload_{{ $k }} mb-1">上传文件</div>
                                                                                    <input type="file" class="submission_{{ $k }}" data-type="{{ $file->file_type }}" data-size="{{ $file->file_size }}" @if($file->is_required) required @endif>
                                                                                    <div class="progress mt-3" style="visibility: hidden;">
                                                                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                    <div class="btn btn-danger btn-sm float-right btn-remove_{{ $k }} mt-2" style="visibility: hidden;">移除文件</div>
                                                                                </div>
                                                                                <div class="card-footer text-muted">
                                                                                    <p>文档格式：{{ $file->file_type }}</p>
                                                                                    <p>文档大小：{{ $file->file_size }}M以内</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    <input type="hidden" name="submission_files" id="submission_files">
                                                                    <input type="hidden" id="countNum" value="{{ count($setting->files) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="form-group row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-10 text-center">
                                                        <div class="btn btn-primary final-submission">提交</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {
            const count = $('#countNum').val();
            let data = {};
            let obj = {};
            for(let i=0;i<count;i++) {
                const submission = $("."+'submission_'+i);
                let limitType = submission.attr('data-type');
                limitType = limitType.toLowerCase();
                let maxSize = submission.attr('data-size');
                //  判断上传文件的类型和大小
                submission.change(function() {
                    const inputFile = submission.get(0).files[0];
                    const fileType = inputFile.type;
                    const fileSize = inputFile.size;
                    const fileName = inputFile.name;
                    const fileSuffix = fileName.substr(fileName.lastIndexOf('.')+1);
                    // 判断上传文件的类型是否符合
                    if(fileType) {
                        const suffix = fileType.split('/')[1];
                        if(limitType.indexOf(suffix) != -1) {
                            //  获取type类型和指定type类型匹配
                        }else {
                            if(limitType.indexOf(fileSuffix) != -1) {
                                //  获取type类型和指定type类型不匹配，但是文件后缀匹配;
                            }else {
                                //  获取type类型和指定type类型不匹配，并且文件后缀也不匹配
                                $("."+'submission_'+i).val('');
                                Swal.fire({
                                    title: "上传文件类型错误",
                                    icon: 'warning',
                                    confirmButtonText: '确定',
                                    timer: 3000,
                                });
                                return false;
                            }
                        }
                    }else {
                        if(limitType.indexOf(fileSuffix) != -1) {
                            //  不是常见文件类型，获取type类型值为空，文件后缀匹配
                        }else {
                            //  不是常见文件类型，获取type类型值为空，文件后缀也不匹配
                            $("."+'submission_'+i).val('');
                            Swal.fire({
                                title: "上传文件类型错误",
                                icon: 'warning',
                                confirmButtonText: '确定',
                                timer: 3000,
                            });
                            return false;
                        }
                    }
                    //  判断上传文件的大小是否在限定大小之内
                    if(fileSize > maxSize*1024*1024) {
                        $("."+'submission_'+i).val('');
                        Swal.fire({
                            title: "上传文件大小超过"+maxSize+'M',
                            icon: 'error',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                    if(inputFile) {
                        $("."+'btn-remove_'+i).css('visibility', 'visible');
                    }
                });
                // 上传文件相关
                $("."+'btn-upload_'+i).click(function() {
                    const progress = $('.'+'submission_'+i+' + '+'.progress');
                    const progressBar = $('.'+'submission_'+i+' + '+'.progress .progress-bar');
                    let valuenow =  progressBar.attr('aria-valuenow');
                    if(valuenow > 0) {
                        if(valuenow == 100) {
                            Swal.fire({
                                title: "请勿重复上传",
                                icon: 'warning',
                                confirmButtonText: '确定',
                                timer: 3000,
                            });
                        }else {
                            Swal.fire({
                                title: "上传中请稍后",
                                icon: 'warning',
                                confirmButtonText: '确定',
                                timer: 3000,
                            });
                        }
                        return false;
                    }
                    const formData = new FormData();
                    let fileObj = $("."+'submission_'+i).get(0).files[0];
                    if(!fileObj) {
                        Swal.fire({
                            title: "请先选择文件",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                    formData.append("file", fileObj);
                    formData.append('submission_value', 'submission_'+i);

                    axios({
                        method:"POST",
                        headers: { 'Content-Type': 'multipart/form-data' },
                        url:"{{ route('upload_file') }}",
                        data: formData,
                        onUploadProgress: function(progressEvent) {
                            if (progressEvent.lengthComputable) {
                                const percent = Math.round(progressEvent.loaded * 100 / progressEvent.total);
                                progress.css('visibility', 'visible');
                                progressBar.html(percent + '%');//设置进度显示百分比
                                progressBar.attr('aria-valuenow', percent);//设置当前显示百分比
                                progressBar.width(percent + '%');//设置完成的进度条宽度
                            }
                            else {
                                $('.progress').html('错误');
                            }
                        }
                    }).then(res => {
                        data = Object.assign(data, res.data.submission_files);
                        $('#submission_files').val(JSON.stringify(data));
                        console.log(typeof JSON.stringify(data));
                        console.log(JSON.stringify(data));
                    }).catch(err => {
                        Swal.fire({
                            title: "网络或系统错误",
                            icon: 'error',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                    });
                });
                //  移除文件相关
                $("."+'btn-remove_'+i).click(function() {
                    $("."+'submission_'+i).val('');
                    for(let l=0;l<count;l++) {
                        obj = Object.assign(obj, data[l]);
                        let key = 'submission_'+i;
                        if(obj.hasOwnProperty(key)) {
                            delete obj[key];
                        }
                    }
                    const progress = $('.'+'submission_'+i+' + '+'.progress');
                    const progressBar = $('.'+'submission_'+i+' + '+'.progress .progress-bar');
                    progress.css('visibility', 'hidden');
                    progressBar.html('');//清空进度百分比
                    progressBar.attr('aria-valuenow', 0);//清空当前显示百分比
                    progressBar.width('');//清空进度条宽度
                    //  隐藏移除按钮自己
                    $(this).css('visibility', 'hidden');
                });
            }
            $('#works_name').focusout(function() {
                if($('#works_name').val()) {
                    $('#works_name').next().removeClass('alert-show');
                }
            });
            $('#works_description').focusout(function() {
                if($('#works_description').val()) {
                    $('#works_description').next().removeClass('alert-show');
                }
            });
            //  提交按钮相关
            $('.final-submission').click(function() {
                if(!$('#works_name').val()) {
                    $('#works_name').next().addClass('alert-show');
                    Swal.fire({
                        title: $('#works_name').attr('data-name')+"不能为空",
                        icon: 'warning',
                        confirmButtonText: '确定',
                        timer: 3000,
                    });
                    return false;
                }
                if(!$('#works_description').val()) {
                    $('#works_description').next().addClass('alert-show');
                    Swal.fire({
                        title: $('#works_description').attr('data-description')+"不能为空",
                        icon: 'warning',
                        confirmButtonText: '确定',
                        timer: 3000,
                    });
                    return false;
                }
                for(let j=0;j<count;j++) {
                    const submission = $("."+'submission_'+j);
                    let fileObj = submission.get(0).files[0];
                    const isRequired = submission.attr('required');
                    if(!fileObj && isRequired) {
                        Swal.fire({
                            title: "请先选择文件",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                }
                for(let k=0;k<count;k++) {
                    let key = 'submission_'+k;
                    const isRequired = $('.'+key).attr('required');
                    if(!data[key] && isRequired) {
                        Swal.fire({
                            title: "请先上传文件",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                }
                $('#submission-file').submit();
            });
        })
    </script>
@stop
