// 注册一个名为 registrations-teacher 的组件
Vue.component('registrations-teacher', {
    // 定义组件的属性
    props: {
        // 用来初始化省市学校的值，在编辑时会用到
        initValue: {
            type: Array, // 格式是数组
            default: () => ([]), // 默认是个空数组
        }
    },
    // 组件的数据
    data() {
        return {
            len: 1,
            guide_teachers: [],
            teachers: [
                {teacher_name:'', teacher_phone:'', teacher_email:'', teacher_working_company:'', teacher_position:''}
            ]
        }
    },
    created() {
        this.setGuideTeachersValue(this.initValue);
    },
    methods: {
        addTeacher() {
            this.teachers.push({teacher_name:'', teacher_phone:'', teacher_email:'', teacher_working_company:'', teacher_position:''});
            this.len++;
        },
        minusTeacher() {
            this.teachers.pop({teacher_name:'', teacher_phone:'', teacher_email:'', teacher_working_company:'', teacher_position:''});
            this.len--;
        },
        setGuideTeachersValue(value) {
            if(value != null) {
                this.len = value.length;
                this.teachers = value;
            }
        }
    }
});
