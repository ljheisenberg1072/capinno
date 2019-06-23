@extends('layouts.app')
@section('title', '大赛报名')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav">
                <a href="#" class="nav-link btn btn-primary active" style="width: 150px;margin-left: 2px;">报名</a>
                <a href="#" class="nav-link btn btn-dark" style="width: 150px;margin-left: 2px;">初赛</a>
                <a href="#" class="nav-link btn btn-dark" style="width: 150px;margin-left: 2px;">复赛</a>
                <a href="#" class="nav-link btn btn-dark" style="width: 150px;margin-left: 2px;">决赛</a>
                <a href="#" class="nav-link btn btn-dark" style="width: 150px;margin-left: 2px;">创业面试</a>
            </ul>
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
                    <user-signs-create-and-edit inline-template>
                        @if ($user_sign->id)
                        <form class="form-horizontal" role="form" action="{{ route('user_signs.update', ['user_sign' => $user_sign->id]) }}}" method="post">
                             {{ method_field('PUT') }}
                        @else
                        <form class="form-horizontal" role="form" action="{{ route('user_signs.store') }}}" method="post">
                        @endif
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长姓名</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_name" value="{{ old('leader_name', $user_sign->leader_name) }}" placeholder="队长姓名">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长电话</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_phone" value="{{ old('leader_phone', $user_sign->leader_phone) }}" placeholder="队长电话">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>请选择身份</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="identity">
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
                                        <input v-if="!Object.keys(schools).length" class="form-control" type="text" name="school_name" placeholder="请输入学校">
                                        <select v-else class="form-control" v-model="schoolId">
                                            <option value="">请选择学校</option>
                                            <option v-for="(name, id) in schools" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </select-school>
                            <!-- 插入了 3 个隐藏的字段，通过 v-model 与 user-signs-create-and-edit 组件里的值关联起来，当组件中的值变化时，这里的值也会跟着变 -->
                            <input type="hidden" name="school_province" v-model="school_province">
                            <input type="hidden" name="school_city" v-model="school_city">
                            <input type="hidden" name="school" v-model="school">
                            <select-city :init-value="{{ json_encode([old('province', $user_sign->province), old('city', $user_sign->city)]) }}" @change="onCityChanged" inline-template>
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
                                        <input class="form-control" type="text" name="address" value="{{ old('address', $user_sign->address) }}" placeholder="请输入详细地址">
                                    </div>
                                </div>
                            </select-city>
                            <!-- 插入了 2 个隐藏的字段，通过 v-model 与 user-signs-create-and-edit 组件里的值关联起来，当组件中的值变化时，这里的值也会跟着变 -->
                            <input type="hidden" name="province" v-model="province">
                            <input type="hidden" name="city" v-model="city">
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>队长邮箱</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="leader_email" value="{{ old('leader_email', $user_sign->leader_email) }}" placeholder="队长邮箱">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>就职单位</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="working_company" value="{{ old('working_company', $user_sign->working_company) }}" placeholder="就职单位">
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <span style="color:red;">(没有写无)</span>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <label class="col-form-label text-md-right col-sm-2"><span class="mr-1" style="color:#ff0000;">*</span>团队名</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="team_name" value="{{ old('team_name', $user_sign->team_name) }}" placeholder="团队名">
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
                            <div class="form-group row">
                                <div class="col-sm-11 row">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="member_name" value="{{ old('member_name') }}" placeholder="其他作者姓名">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="member_phone" value="{{ old('member_phone') }}" placeholder="其他作者电话">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="member_email" value="{{ old('member_email') }}" placeholder="邮箱">
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="member_identity">
                                            <option value="">请选择</option>
                                            <option value="1">学生</option>
                                            <option value="2">职员</option>
                                            <option value="3">自由职业者</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="member_school" value="{{ old('member_school') }}" placeholder="学校">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="member_working_company" value="{{ old('member_working_company') }}" placeholder="就职单位">
                                    </div>
                                </div>
                                <div class="col-sm-1 mt-2">
                                    <span><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
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
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="teacher_name" value="{{ old('teacher_name') }}" placeholder="其他作者姓名">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="teacher_phone" value="{{ old('teacher_phone') }}" placeholder="其他作者电话">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="teacher_email" value="{{ old('teacher_email') }}" placeholder="邮箱">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="teacher_working_company" value="{{ old('teacher_working_company') }}" placeholder="就职单位">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="teacher_position" value="{{ old('teacher_position') }}" placeholder="职位">
                                </div>
                                <div class="col-sm-2 mt-2">
                                    <span><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <div class="col-sm-4 ml-4">
                                    <span class="mr-1" style="color:#ff0000;">*</span>
                                    <input type="checkbox" name="agreement" @if($user_sign->id) checked @endif>
                                    <a href="#">我同意《比赛参赛者承诺书》</a>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">确认提交</button>
                                </div>
                            </div>
                        </form>
                    </user-signs-create-and-edit>
                </div>
            </div>
        </div>
    </div>
@endsection