<template>
    <div>
        <el-upload
            class="upload-demo"
            ref="upload"
            drag
            action="string"
            :on-preview="handlePreview"
            :on-remove="handleRemove"
            :on-success="handleSuccess"
            :before-remove="beforeRemove"
            :before-upload="beforeUpload"
            :http-request="uploadFile"
            :on-change="handleChange"
            :headers="headers"
            :limit="1"
            accept="image/*"
            :file-list="fileList">
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
        </el-upload>
    </div>
</template>
<script>
export default {
    data() {
        return {
            headers: {'Content-Type': 'multipart/form-data'},
            fileList: [],
        };
    },
    methods: {
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePreview(file) {
            console.log(file);
        },
        beforeRemove(file, fileList) {
            return this.$confirm(`确定移除 ${ file.name }？`);
        },
        handleSuccess(res, file) {
            this.fileList.name = file.name;
            this.fileList.url = URL.createObjectURL(file.raw);
        },
        beforeUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
                this.$message.error('上传头像图片只能是 JPG 格式!');
            }
            if (!isLt2M) {
                this.$message.error('上传头像图片大小不能超过 2MB!');
            }
            return isJPG && isLt2M;
        },
        uploadFile(param) {
            const formData = new FormData();
            formData.append('file', param.file);
            axios.post('/upload_file', formData).then(res => {
                this.fileList.url = res.data.submission_files;
                console.log(res);
            }).catch(err => {
                console.log(err);
            })
        },
        handleChange(file) {
            this.$refs.upload.clearFiles();
        }
    }
}
</script>
