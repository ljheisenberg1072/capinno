<?php

namespace App\Http\Requests;

class UserSignRequest extends Request
{

    public function rules()
    {
        return [
            'leader_name'       => 'required',
            'leader_phone'      => 'required',
            'identity'          => 'required',
            'school_province'   => 'required',
            'school_city'       => 'required',
            'school'            => 'required',
            'province'          => 'required',
            'city'              => 'required',
            'address'           => 'required',
            'leader_email'      => 'required',
            'working_company'   => 'required',
            'team_name'         => 'required',
            'other_members'      => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'leader_name'       => '队长姓名',
            'leader_phone'      => '队长电话',
            'identity'          => '身份',
            'school_province'   => '学校所在省',
            'school_city'       => '学校所在市',
            'school'            => '学校',
            'province'          => '省',
            'city'              => '市',
            'address'           => '详细地址',
            'leader_email'      => '队长邮箱',
            'working_company'   => '就职单位',
            'team_name'         => '团队名',
            'other_members'     => '其他队员',
        ];
    }
}
