// 注册一个名为 user-signs-create-and-edit 的组件
Vue.component('user-signs-create-and-edit', {
    // 组件的数据
    data() {
        return {
            school_province: '', // 省
            school_city: '', // 市
            school: '', // 学校
            province: '', // 省
            city: '', // 市
        }
    },
    methods: {
        // 把参数 val 中的值保存到组件的数据中
        onSchoolChanged(val) {
            if (val.length === 3) {
                this.school_province = val[0];
                this.school_city = val[1];
                this.school = val[2];
            }
        },
        // 把参数 val 中的值保存到组件的数据中
        onCityChanged(val) {
            if (val.length === 2) {
                this.province = val[0];
                this.city = val[1];
            }
        }
    }
});