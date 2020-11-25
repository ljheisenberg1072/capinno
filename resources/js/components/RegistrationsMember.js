// 注册一个名为 registrations-member 的组件
Vue.component('registrations-member', {
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
            other_members: [],
            members: [
                {member_name:'', member_phone:'', member_email:'', member_identity:'', member_school:'', member_working_company:''}
            ]
        }
    },
    created() {
      this.setOtherMembersValue(this.initValue);
    },
    methods: {
        addMember() {
            this.members.push({member_name:'', member_phone:'', member_email:'', member_identity:'', member_school:'', member_working_company:''});
            this.len++;
        },
        minusMember() {
            this.members.pop({member_name:'', member_phone:'', member_email:'', member_identity:'', member_school:'', member_working_company:''});
            this.len--;
        },
        setOtherMembersValue(value) {
            if(value != null) {
                this.len = value.length;
                this.members = value;
            }
        }
    }
});
