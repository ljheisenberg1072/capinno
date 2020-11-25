<?php

namespace App\Http\Requests;

class StageSubmissionRequest extends Request
{

    public function rules()
    {
        return [
            'works_name' => 'required',
            'works_description' => 'required',
            'submission_files' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'works_name' => '作品名称',
            'works_description' => '作品说明'
        ];
    }
}
