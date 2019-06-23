<?php

namespace App\Http\Requests;

class UserSignRequest extends Request
{

    public function rules()
    {
        return [
            'campaign_id'       => 'required',
            'leader_name'       => 'required',
            'leader_phone'      => 'required',
            'identity'          => 'required',
            'school_province'   => 'required',
            'school_city'       => 'required',
            'school_name'       => 'required',
            'address_province'  => 'required',
            'address_city'      => 'required',
            'address_detail'    => 'required',
            'leader_email'      => 'required',
            'working_company'   => 'required',
            'team_name'         => 'required',
            'other_member'      => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'campaign_id'       => '大赛选项',
            'leader_name'       => '队长姓名',
            'leader_phone'      => '队长电话',
            'identity'          => '身份',
            'school_province'   => '学校所在省',
            'school_city'       => '学校所在市',
            'school_name'       => '学校',
            'address_province'  => '省',
            'address_city'      => '市',
            'address_detail'    => '详细地址',
            'leader_email'      => '队长邮箱',
            'working_company'   => '就职单位',
            'team_name'         => '团队名',
            'other_member'      => '其他队员',
        ];
    }
}
