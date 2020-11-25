@extends('layouts.app')
@section('title', '大赛报名')

@section('content')
    <section class="registration-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('registrations._nav')
                    <div class="row mt-4 mb-2">
                        <div class="col-md-12">
                            <p style="color: #ff0000;">填写说明：为了顺利参赛，请填写真实信息，学生自行组队参赛。由队长进行注册账号、报名和提交团队作品。建议每队5人左右，8人为上限，不允许单人报名。 作者姓名默认为团队队长，联系信息以队长为准。</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">
                                {{ $campaign->campaign_name }}报名表
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- 输出后端报错开始 -->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <h4>有错误发生：</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- 输出后端报错结束 -->
                            <!-- inline-template 代表通过内联方式引入组件 -->
                            <registrations-create-and-edit inline-template>
                                @if ($registration->id)
                                <form class="form-horizontal" role="form" action="{{ route('registrations.update', ['campaign' => $campaign->id, 'registration' => $registration->id]) }}" method="post">
                                    {{ method_field('PUT') }}
                                @else
                                <form class="form-horizontal" role="form" action="{{ route('registrations.store', ['campaign' => $campaign->id]) }}" method="post">
                                    @endif
                                    {{ csrf_field() }}
                                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长姓名</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="leader_name" value="{{ old('leader_name', $registration->leader_name) }}" placeholder="队长姓名">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长电话</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="leader_phone" value="{{ old('leader_phone', $registration->leader_phone) }}" placeholder="队长电话">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>请选择身份</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="identity">
                                                <option value="">请选择</option>
                                                <option value="1" @if($registration->identity == "1") selected @endif>学生</option>
                                                <option value="2" @if($registration->identity == "2") selected @endif>职员</option>
                                                <option value="3" @if($registration->identity == "3") selected @endif>自由职业者</option>
                                            </select>
                                        </div>
                                    </div>
                                    <select-school :init-value="{{ json_encode([old('school_province', $registration->school_province), old('school_city', $registration->school_city), old('school', $registration->school)]) }}" @change="onSchoolChanged" inline-template>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-2 text-md-right"><span class="mr-1" style="color:#ff0000;">*</span>学校</label>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="provinceId">
                                                    <option value="">请选择省</option>
                                                    <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="cityId">
                                                    <option value="">请选择市</option>
                                                    <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select v-if="provinceId != '420000' && provinceId != '430000' && provinceId != '440000' && provinceId != '450000'" class="form-control" v-model="schoolId">
                                                    <option value="">请选择学校</option>
                                                    <option v-for="(name, id) in schools" :value="id">@{{ name }}</option>
                                                </select>
                                                <input v-else class="form-control" type="text" name="school" value="{{ old('school', $registration->school) }}" placeholder="请输入学校">
                                            </div>
                                        </div>
                                    </select-school>
                                    <input type="hidden" name="school_province" v-model="school_province">
                                    <input type="hidden" name="school_city" v-model="school_city">
                                    <input type="hidden" name="school" v-if="school_province != '香港' && school_province != '澳门' && school_province != '台湾' && school_province != '海外'" v-model="school">
                                    <select-city :init-value="{{ json_encode([old('province', $registration->province), old('city', $registration->city)]) }}" @change="onCityChanged" inline-template>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-2 text-md-right"><span class="mr-1" style="color:#ff0000;">*</span>联系地址</label>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="provinceId">
                                                    <option value="">请选择省</option>
                                                    <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="cityId">
                                                    <option value="">请选择市</option>
                                                    <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" type="text" name="address" value="{{ old('address', $registration->address) }}" placeholder="请输入详细地址">
                                            </div>
                                        </div>
                                    </select-city>
                                    <input type="hidden" name="province" v-model="province">
                                    <input type="hidden" name="city" v-model="city">
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长邮箱</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="leader_email" value="{{ old('leader_email', $registration->leader_email) }}" placeholder="队长邮箱">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>就职单位</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="working_company" value="{{ old('working_company', $registration->working_company) }}" placeholder="就职单位">
                                        </div>
                                        <div class="col-sm-3 mt-2">
                                            <span style="color:red;">(没有写无)</span>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>团队名</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="team_name" value="{{ old('team_name', $registration->team_name) }}" placeholder="团队名">
                                        </div>
                                        <div class="col-sm-3 mt-2">
                                            <span>参赛总人数上限：8人</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-11 row">
                                            <div class="col-sm-2  text-md-left">
                                                <label class="col-form-label"><span class="mr-1" style="color:#ff0000;">*</span>其他作者姓名</label>
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
                                                <span style="color:red;">(没有写无)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <registrations-member :init-value="{{ json_encode($registration->other_members) }}" inline-template>
                                        <div>
                                            <div class="form-group row" v-for="(member,index) in members" :key="index">
                                                <div class="col-sm-11 row">
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" v-model="member.member_name"  placeholder="其他作者姓名" required>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" v-model="member.member_phone"  placeholder="其他作者电话" required>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" v-model="member.member_email"  placeholder="邮箱" required>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" v-model="member.member_identity" required>
                                                            <option value="">请选择</option>
                                                            <option value="1">学生</option>
                                                            <option value="2">职员</option>
                                                            <option value="3">自由职业者</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" v-model="member.member_school"  placeholder="学校" required>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" v-model="member.member_working_company"  placeholder="就职单位" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 row mt-2">
                                                    <div class="col-sm-6">
                                                        <span v-if="index == len - 1 && index != 6" @click="addMember"><i class="fa fa-plus" style="cursor: pointer;"></i></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span v-if="index != 0" @click="minusMember"><i class="fa fa-minus" style="cursor: pointer;"></i></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" :name='"other_members[" + index + "][member_name]"' v-model="member.member_name">
                                                <input type="hidden" :name='"other_members[" + index + "][member_phone]"' v-model="member.member_phone">
                                                <input type="hidden" :name='"other_members[" + index + "][member_email]"' v-model="member.member_email">
                                                <input type="hidden" :name='"other_members[" + index + "][member_identity]"' v-model="member.member_identity">
                                                <input type="hidden" :name='"other_members[" + index + "][member_school]"' v-model="member.member_school">
                                                <input type="hidden" :name='"other_members[" + index + "][member_working_company]"' v-model="member.member_working_company">
                                            </div>
                                        </div>
                                    </registrations-member>
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
                                    <registrations-teacher :init-value="{{ json_encode($registration->guide_teachers) }}" inline-template>
                                        <div>
                                            <div class="form-group row" v-for="(teacher,index) in teachers" :key="index">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" v-model="teacher.teacher_name" placeholder="指导老师姓名" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" v-model="teacher.teacher_phone" placeholder="指导老师电话" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" v-model="teacher.teacher_email" placeholder="邮箱" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" v-model="teacher.teacher_working_company" placeholder="就职单位" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" v-model="teacher.teacher_position" placeholder="职位" required>
                                                </div>
                                                <div class="col-sm-1 row mt-2">
                                                    <div class="col-sm-6">
                                                        <span v-if="index == len - 1 && index != 1" @click="addTeacher"><i class="fa fa-plus" style="cursor: pointer;"></i></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span v-if="index != 0" @click="minusTeacher"><i class="fa fa-minus" style="cursor: pointer;"></i></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" :name='"guide_teachers[" + index + "][teacher_name]"' v-model="teacher.teacher_name">
                                                <input type="hidden" :name='"guide_teachers[" + index + "][teacher_phone]"' v-model="teacher.teacher_phone">
                                                <input type="hidden" :name='"guide_teachers[" + index + "][teacher_email]"' v-model="teacher.teacher_email">
                                                <input type="hidden" :name='"guide_teachers[" + index + "][teacher_working_company]"' v-model="teacher.teacher_working_company">
                                                <input type="hidden" :name='"guide_teachers[" + index + "][teacher_position]"' v-model="teacher.teacher_position">
                                            </div>
                                        </div>
                                    </registrations-teacher>
                                    <hr />
                                    <div class="form-group row">
                                        <div class="col-sm-4 ml-4">
                                            <span class="mr-1" style="color:#ff0000;">*</span>
                                            <input type="checkbox" name="agreement" @if($registration->id) checked @endif required>
                                            <a href="#">我同意《比赛参赛者承诺书》</a>
                                        </div>
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            @if($registration->id)
                                                <button type="submit" class="btn btn-primary">确认修改</button>
                                            @else
                                                <button type="submit" class="btn btn-primary">确认提交</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </registrations-create-and-edit>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
