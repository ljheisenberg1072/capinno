<?php

namespace App\Http\Requests;

class StageSubmissionRequest extends Request
{

    public function rules()
    {
        return [
            'works_name' => 'nullable',
            'works_description' => 'nullable',
            'works_category' => 'nullable',
            'submission_files' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'works_name' => '作品名称',
            'works_description' => '作品说明',
            'works_category' => '作品主题',
        ];
    }
}
