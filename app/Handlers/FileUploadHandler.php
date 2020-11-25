<?php

namespace App\Handlers;

use Illuminate\Support\Str;

class FileUploadHandler
{
    public function save($file, $folder, $file_prefix)
    {
        //  构建存储的文件夹规则，如：uploads/files/2020/11/06/
        //  文件夹切割能让查找效率更高
        $folder_name = "uploads/files/$folder/".date("Y/m/d", time());
        //  文件具体存储的物理路径，`public_path()`获取的是`public`文件夹的物理路径
        //  值如：/home/vagrant/code/capinno/public/uploads/files/2020/11/06/
        $upload_path = storage_path('app/public').'/'.$folder_name;
        //  获取文件的后缀名
        $extension = strtolower($file->getClientOriginalExtension());
        //  拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的ID
        $filename = $file_prefix.'_'.time().'_'.Str::random(10).'.'.$extension;

        //  将文件移动到我们的目标存储路径中
        $file->move($upload_path, $filename);

        return [
            'path' => "$folder_name/$filename"
        ];
    }
}
