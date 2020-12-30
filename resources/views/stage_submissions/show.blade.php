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
                                        <form action="{{ route('stage_submissions.edit', ['campaign' => $campaign->id, 'campaign_stage' => $campaign_stage->id, 'stage_submission' => $stage_submission->id]) }}" method="GET" id="submission-file">
                                            {{ csrf_field() }}
                                            @if(count($settings = $campaign_stage->settings))
                                                @foreach($settings as $setting)
                                                    <div class="form-group row">
                                                        <label for="works_name" class="col-sm-2 col-form-label">{{ $setting->works_name }}：</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="works_name" name="works_name" value="{{ $stage_submission->works_name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="works_description" class="col-sm-2 col-form-label">{{ $setting->works_description }}：</label>
                                                        <div class="col-lg-10">
                                                            <textarea class="form-control" rows="5" id="works_description" name="works_description" disabled>{{ $stage_submission->works_description }}</textarea>
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
                                                                                    @if(isset($stage_submission->submission_files['submission_'.$k]))
                                                                                        @if('PDF' == $file->file_type)
                                                                                            <div class="text-center"><i class="far fa-file-pdf fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right preview_{{ $k }}" target="_blank">预览</a>
                                                                                        @elseif(stripos('PNG/JPG/JPEG', $file->file_type) !== false)
                                                                                            <div class="text-center"><i class="far fa-file-image fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right preview_{{ $k }}" target="_blank">预览</a>
                                                                                        @elseif(stripos('DOC/DOCX', $file->file_type) !== false)
                                                                                            <div class="text-center"><i class="far fa-file-word fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right preview-office_{{ $k }}" target="_blank">预览</a>
                                                                                        @elseif(stripos('PPT/PPTX', $file->file_type) !== false)
                                                                                            <div class="text-center"><i class="far fa-file-powerpoint fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right preview-office_{{ $k }}" target="_blank">预览</a>
                                                                                        @elseif(stripos('ZIP/RAR', $file->file_type) !== false)
                                                                                            <div class="text-center"><i class="far fa-file-archive fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right download_{{ $k }}">下载</a>
                                                                                        @elseif('MP4' == $file->file_type)
                                                                                            <div class="text-center"><i class="far fa-file-video fa-5x"></i></div>
                                                                                            <a href="javascript:;" class="btn btn-success btn-sm float-right video-play_{{ $k }}" target="_blank">播放</a>
                                                                                        @endif
                                                                                    @else
                                                                                        <div class="text-center" style="padding: 48px 0"><i></i></div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="card-footer text-muted">
                                                                                    <p>文档格式：{{ $file->file_type }}</p>
                                                                                    <p>文档大小：{{ $file->file_size }}M以内</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    <input type="hidden" id="countNum" value="{{ count($setting->files) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="form-group row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-10 text-center">
                                                        <div class="btn btn-primary final-submission">修改信息</div>
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
        const submissionFiles = {!! json_encode($stage_submission->submission_files) !!}
        $(document).ready(function() {
            const count = $('#countNum').val();
            for(let i =0;i<count;i++) {
                let key = 'submission_'+i;
                if(submissionFiles.hasOwnProperty(key)) {
                    const domain = '{!! env('APP_URL').'/storage/' !!}';
                    const uploadUrl = submissionFiles[key];
                    const url = domain + uploadUrl;
                    const suffix = uploadUrl.substr(uploadUrl.lastIndexOf('.')+1).toUpperCase();
                    const office = 'https://view.officeapps.live.com/op/view.aspx?src=';
                    const officeUrl = office + encodeURI(url);
                    if('PDF/PNG/JPG/JPEG'.indexOf(suffix) !== -1) {
                        $('.'+'preview_'+i).attr('href', url);
                    }else if('DOC/DOCX/PPT/PPTX'.indexOf(suffix) !== -1) {
                        $('.'+'preview-office_'+i).attr('href', officeUrl);
                    }else if('ZIP/RAR'.indexOf(suffix) !== -1) {
                        $('.'+'download_'+i).attr('href', url);
                    }else if('MP4' === suffix) {
                        $('.'+'video-play_'+i).attr('href', url);
                    }
                }
            }
            $('.final-submission').click(function() {
                $('#submission-file').submit();
            });
        })
    </script>
@stop
