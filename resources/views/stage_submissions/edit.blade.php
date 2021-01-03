@extends('layouts.app')
@section('title', $campaign_stage->stage_name)

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
                                        <form action="{{ route('stage_submissions.update', ['campaign' => $campaign->id, 'campaign_stage' => $campaign_stage->id, 'stage_submission' => $stage_submission->id]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="submission-file">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            @if(count($settings = $campaign_stage->settings))
                                                @foreach($settings as $setting)
                                                    <div class="form-group row" @if($firstStageId != $campaign_stage->id) style="display: none;" @endif id="div-name">
                                                        <label for="works_name" class="col-sm-2 col-form-label">{{ $setting->works_name }}：</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="works_name" name="works_name" data-name="{{ $setting->works_name }}" placeholder="{{ $setting->works_name }}" value="{{ old('works_name', $stage_submission->works_name) }}">
                                                            <p class="alert-hidden mt-1">@if($errors->has('works_name')) {{ $errors->first('works_name') }}@else请输入{{ $setting->works_name }}@endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" @if($firstStageId != $campaign_stage->id) style="display: none;" @endif id="div-description">
                                                        <label for="works_description" class="col-sm-2 col-form-label">{{ $setting->works_description }}：</label>
                                                        <div class="col-lg-10">
                                                            <textarea class="form-control" rows="5" id="works_description" name="works_description" data-description="{{ $setting->works_description }}" placeholder="简单阐述一下{{ $setting->works_description }}">{{ old('works_description', $stage_submission->works_description) }}</textarea>
                                                            <p class="alert-hidden mt-1">@if($errors->has('works_description')) {{ $errors->first('works_description') }}@else请输入{{ $setting->works_description }}@endif</p>
                                                        </div>
                                                    </div>
                                                    @if(count($campaignCategories))
                                                        <div class="form-group row" @if($firstStageId != $campaign_stage->id) style="display: none;" @endif id="div-category">
                                                            <label for="works_category" class="col-sm-2 col-form-label">作品主题</label>
                                                            <div class="col-lg-10">
                                                                <select class="form-control" id="works_category" name="works_category">
                                                                    <option value="" style="display: none;"></option>
                                                                    @foreach($campaignCategories as $campaignCategory)
                                                                        <option value="{{ $campaignCategory->id }}" @if($stage_submission->works_category == $campaignCategory->id) selected @endif>{{ $campaignCategory->category_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="alert-hidden mt-1">@if($errors->has('works_category')) {{ $errors->first('works_category') }}@else请选择作品主题@endif</p>
                                                            </div>
                                                        </div>
                                                    @endif
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
                                                                                    <div class="btn btn-success btn-sm float-right btn-upload_{{ $k }} mb-1" @if(isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @endif>上传文件</div>
                                                                                    <div class="text-center preview-image_{{ $k }}"><i class="far fa-file-pdf fa-6x" @if(!isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @endif></i></div>
                                                                                    <input type="file" class="submission_{{ $k }}" data-type="{{ $file->file_type }}" data-size="{{ $file->file_size }}" @if($file->is_required) required @endif @if(isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @endif>
                                                                                    <div class="progress mt-3 progress_{{ $k }}" @if(isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @else style="visibility: hidden;" @endif>
                                                                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                    <div class="btn btn-danger btn-sm float-right btn-abandon_{{ $k }} mt-2" style="display: none;">放弃编辑</div>
                                                                                    <div class="btn btn-danger btn-sm float-right btn-remove_{{ $k }} mt-2" @if(isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @else style="visibility: hidden;" @endif>移除文件</div>
                                                                                    <div class="btn btn-success btn-sm float-right btn-edit_{{ $k }} mt-3" @if(!isset($stage_submission->submission_files['submission_'.$k])) style="display: none;" @endif>编辑</div>
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
            data = obj = {!! json_encode($stage_submission->submission_files) !!};
            //  如果提交不修改文件
            $('#submission_files').val(JSON.stringify(data));
            for(let i=0;i<count;i++) {
                const submission = $("."+'submission_'+i);
                let limitType = submission.attr('data-type');
                limitType = limitType.toLowerCase();
                let maxSize = submission.attr('data-size');

                //  点击编辑按钮
                $('.'+'btn-edit_'+i).click(function() {
                    $(this).css('display', 'none');
                    $('.'+'preview-image_'+i).css('display', 'none');
                    $('.'+'btn-upload_'+i).css('display', 'block');
                    $('.'+'btn-abandon_'+i).css('display', 'block');
                    $('.'+'progress_'+i).css({'display': 'flex', 'visibility': 'hidden'});
                    submission.css('display', 'block');
                });
                //  点击放弃编辑按钮
                $('.'+'btn-abandon_'+i).click(function() {
                    $(this).css('display', 'none');
                    $('.'+'preview-image_'+i).css('display', 'block');
                    $('.'+'btn-upload_'+i).css('display', 'none');
                    $('.'+'btn-edit_'+i).css('display', 'block');
                    $('.'+'btn-remove_'+i).css('display', 'none');
                    $('.'+'progress_'+i).css('display', 'none');
                    //  清空所选择文件
                    submission.val('');
                    //  隐藏选择文件按钮
                    submission.css('display', 'none');
                })
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
                        $("."+'btn-remove_'+i).css({'display': 'block', 'visibility': 'visible'});
                        $("."+'btn-remove_'+i).addClass('mr-2');
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
                        let key = 'submission_'+i;
                        //  如果有key值就是替换，否则就是添加key value
                        obj[key] = res.data.submission_files['submission_'+i];
                        data = obj
                        $('#submission_files').val(JSON.stringify(data));
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
            const worksName = $('#works_name');
            const worksDescription = $('#works_description');
            const worksCategory = $('#works_category');
            //  提交按钮相关
            $('.final-submission').click(function() {
                if($('#div-name').css('display') != 'none') {
                    if(!worksName.val()) {
                        worksName.next().addClass('alert-show');
                        Swal.fire({
                            title: worksName.attr('data-name')+"不能为空",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                }
                if($('#div-description').css('display') != 'none') {
                    if(!worksDescription.val()) {
                        worksDescription.next().addClass('alert-show');
                        Swal.fire({
                            title: worksDescription.attr('data-description')+"不能为空",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                }
                if($('#div-category').css('display') != 'none') {
                    if(!worksCategory.val()) {
                        worksCategory.next().addClass('alert-show');
                        Swal.fire({
                            title: worksCategory.attr('data-description')+"不能为空",
                            icon: 'warning',
                            confirmButtonText: '确定',
                            timer: 3000,
                        });
                        return false;
                    }
                }
                for(let j=0;j<count;j++) {
                    const submission = $("."+'submission_'+j);
                    const upload = $('.'+'btn-upload_'+j);
                    const isRequired = submission.attr('required');
                    const progressBar = $('.'+'submission_'+j+' + '+'.progress .progress-bar');
                    let valuenow =  progressBar.attr('aria-valuenow');
                    if(upload.css('display') == 'block') {
                        let fileObj = submission.get(0).files[0];
                        if(!fileObj) {
                            if(isRequired) {
                                Swal.fire({
                                    title: "请先选择文件",
                                    icon: 'warning',
                                    confirmButtonText: '确定',
                                    timer: 3000,
                                });
                                return false;
                            }
                        }else {
                            if(valuenow == 0) {
                                Swal.fire({
                                    title: "检测到有修改，请先上传文件",
                                    icon: 'warning',
                                    confirmButtonText: '确定',
                                    timer: 3000,
                                });
                                return false;
                            }else if(valuenow < 100) {
                                Swal.fire({
                                    title: "上传中请稍后",
                                    icon: 'warning',
                                    confirmButtonText: '确定',
                                    timer: 3000,
                                });
                                return false;
                            }
                        }
                    }
                }
                $('#submission-file').submit();
            });
        })
    </script>
@stop
