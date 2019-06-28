@extends('layouts.app')
@section('title', '大赛报名')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('user_signs._nav')
            <div class="row mt-4 mb-2">
                <div class="col-md-12">
                    <p style="color: #ff0000;">填写说明：为了顺利参赛，请填写真实信息，学生自行组队参赛。由队长进行注册账号、报名和提交团队作品。建议每队5人左右，8人为上限，不允许单人报名。 作者姓名默认为团队队长，联系信息以队长为准。</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        2019 CAPINNO 全球食品饮料商业挑战赛大赛报名
                    </h2>
                </div>
                <div class="card-body">
                    <user-signs-create-and-edit inline-template>
                        <div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长姓名</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_name" value="{{ $user_sign->leader_name }}" placeholder="队长姓名" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长电话</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_phone" value="{{ $user_sign->leader_phone }}" placeholder="队长电话" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>请选择身份</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="identity" disabled>
                                        <option value="">请选择</option>
                                        <option value="1" @if($user_sign->identity == "1") selected @endif>学生</option>
                                        <option value="2" @if($user_sign->identity == "2") selected @endif>职员</option>
                                        <option value="3" @if($user_sign->identity == "3") selected @endif>自由职业者</option>
                                    </select>
                                </div>
                            </div>
                            <select-school :init-value="{{ json_encode([old('school_province', $user_sign->school_province), old('school_city', $user_sign->school_city), old('school', $user_sign->school)]) }}" @change="onSchoolChanged" inline-template>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-md-right"><span class="mr-1" style="color:#ff0000;">*</span>学校</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="provinceId" disabled>
                                            <option value="">请选择省</option>
                                            <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="cityId" disabled>
                                            <option value="">请选择市</option>
                                            <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input v-if="!Object.keys(schools).length" class="form-control" type="text" name="school" value="{{ $user_sign->school }}" placeholder="请输入学校" disabled>
                                        <select v-else class="form-control" v-model="schoolId" disabled>
                                            <option value="">请选择学校</option>
                                            <option v-for="(name, id) in schools" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </select-school>
                            <select-city :init-value="{{ json_encode([old('province', $user_sign->province), old('city', $user_sign->city)]) }}" @change="onCityChanged" inline-template>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-md-right"><span class="mr-1" style="color:#ff0000;">*</span>联系地址</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="provinceId" disabled>
                                            <option value="">请选择省</option>
                                            <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="cityId" disabled>
                                            <option value="">请选择市</option>
                                            <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="address" value="{{ $user_sign->address }}" placeholder="请输入详细地址" disabled>
                                    </div>
                                </div>
                            </select-city>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长邮箱</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_email" value="{{ $user_sign->leader_email }}" placeholder="队长邮箱" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>就职单位</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="working_company" value="{{ $user_sign->working_company }}" placeholder="就职单位" disabled>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <span style="color:red;">(没有写无)</span>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>团队名</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="team_name" value="{{ $user_sign->team_name }}" placeholder="团队名" disabled>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <span>参赛总人数上限：8人</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-11 row">
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">其他作者姓名</label>
                                    </div>
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">其他作者电话</label>
                                    </div>
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">邮箱</label>
                                    </div>
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">身份</label>
                                    </div>
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">学校</label>
                                    </div>
                                    <div class="col-sm-2  text-md-left">
                                        <label class="col-form-label">就职单位</label>
                                    </div>
                                </div>
                            </div>
                            @foreach($user_sign->other_members as $member)
                            <div class="form-group row">
                                <div class="col-sm-11 row">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $member['member_name'] }}" placeholder="其他作者姓名" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $member['member_phone'] }}" placeholder="其他作者电话" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $member['member_email'] }}" placeholder="邮箱" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" disabled>
                                            <option value="">请选择</option>
                                            <option value="1" @if($member['member_identity'] == '1') selected @endif>学生</option>
                                            <option value="2" @if($member['member_identity'] == '2') selected @endif>职员</option>
                                            <option value="3" @if($member['member_identity'] == '3') selected @endif>自由职业者</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $member['member_school'] }}" placeholder="学校" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $member['member_working_company'] }}" placeholder="就职单位" disabled>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group row mt-5">
                                <label class="col-form-label text-md-left col-sm-2">指导老师</label>
                                <div class="col-sm-3 mt-2">
                                    <span>指导人数上限：2人</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2  text-md-left">
                                    <label class="col-form-label">指导老师姓名</label>
                                </div>
                                <div class="col-sm-2  text-md-left">
                                    <label class="col-form-label">指导老师电话</label>
                                </div>
                                <div class="col-sm-2  text-md-left">
                                    <label class="col-form-label">邮箱</label>
                                </div>
                                <div class="col-sm-2  text-md-left">
                                    <label class="col-form-label">就职单位</label>
                                </div>
                                <div class="col-sm-2  text-md-left">
                                    <label class="col-form-label">职位</label>
                                </div>
                            </div>
                            @foreach($user_sign->guide_teachers as $teacher)
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $teacher['teacher_name'] }}" placeholder="其他作者姓名" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $teacher['teacher_phone'] }}" placeholder="其他作者电话" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $teacher['teacher_email'] }}" placeholder="邮箱" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $teacher['teacher_working_company'] }}" placeholder="就职单位" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $teacher['teacher_position'] }}" placeholder="职位" disabled>
                                </div>
                            </div>
                            @endforeach
                            <hr />
                            <div class="form-group row">
                                <div class="col-sm-4 ml-4">
                                    <span class="mr-1" style="color:#ff0000;">*</span>
                                    <input type="checkbox" name="agreement" checked disabled>
                                    <a href="#">我同意《比赛参赛者承诺书》</a>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <a href="{{ route('user_signs.edit', ['user_sign' => $user_sign->id]) }}" class="btn btn-primary">修改信息</a>
                                </div>
                            </div>
                        </div>
                    </user-signs-create-and-edit>
                </div>
            </div>
        </div>
    </div>
@endsection