// 从resources/js/data中加载数据
const schoolData = require('../data/province_city_school_data');
// 引入 lodash，lodash 是一个实用工具库，提供了很多常用的方法
import _ from 'lodash';

// 注册一个名为 select-school 的 Vue 组件
Vue.component('select-school', {
    // 定义组件的属性
    props: {
        // 用来初始化省市学校的值，在编辑时会用到
        initValue: {
            type: Array, // 格式是数组
            default: () => ([]), // 默认是个空数组
        },
    },
    // 定义了这个组件内的数据
    data() {
        return {
            provinces: schoolData['86'], // 省列表
            cities: {}, // 城市列表
            schools: {}, // 学校列表
            provinceId: '', // 当前选中的省
            cityId: '', // 当前选中的市
            schoolId: '', // 当前选中的学校
            school: '',// 自己填写的学校
        };
    },
    // 定义观察器，对应属性变更时会触发对应的观察器函数
    watch: {
        // 当选择的省发生改变时触发
        provinceId(newVal) {
            if (!newVal) {
                this.cities = {};
                this.cityId = '';
                return;
            }
            // 将城市列表设为当前省下的城市
            this.cities = schoolData[newVal];
            // 如果当前选中的城市不在当前省下，则将选中城市清空
            if (!this.cities[this.cityId]) {
                this.cityId = '';
            }
        },
        // 当选择的市发生改变时触发
        cityId(newVal) {
            if (!newVal) {
                this.schools = {};
                this.schoolId = '';
                return;
            }
            //  香港、澳门、台湾、海外的高校无学校列表
            if (newVal == '420100' || newVal == '430100' || newVal == '440100' || newVal == '450100') {
                this.$emit('change', [this.provinces[this.provinceId], this.cities[this.cityId], this.school]);
            }else {
                // 将学校列表设为当前城市下的学校
                this.schools = schoolData[newVal];
                // 如果当前选中的学校不在当前城市下，则将选中学校清空
                if (!this.schools[this.schoolId]) {
                    this.schoolId = '';
                }
            }
        },
        // 当选择的学校发生改变时触发
        schoolId() {
            // 触发一个名为 change 的 Vue 事件，事件的值就是当前选中的省市学校名称，格式为数组
            this.$emit('change', [this.provinces[this.provinceId], this.cities[this.cityId], this.schools[this.schoolId]]);
        },
    },
    // 组件初始化时会调用这个方法
    created() {
        this.setFromValue(this.initValue);
    },
    methods: {
        //
        setFromValue(value) {
            // 过滤掉空值
            value = _.filter(value);
            // 如果数组长度为0，则将省清空（由于我们定义了观察器，会联动触发将城市和学校清空）
            if (value.length === 0) {
                this.provinceId = '';
                return;
            }
            // 从当前省列表中找到与数组第一个元素同名的项的索引
            const provinceId = _.findKey(this.provinces, o => o === value[0]);
            // 没找到，清空省的值
            if (!provinceId) {
                this.provinceId = '';
                return;
            }
            // 找到了，将当前省设置成对应的ID
            this.provinceId = provinceId;
            // 由于观察器的作用，这个时候城市列表已经变成了对应省的城市列表
            // 从当前城市列表找到与数组第二个元素同名的项的索引
            const cityId = _.findKey(schoolData[provinceId], o => o === value[1]);
            // 没找到，清空城市的值
            if (!cityId) {
                this.cityId = '';
                return;
            }
            // 找到了，将当前城市设置成对应的ID
            this.cityId = cityId;
            // 香港、澳门、台湾、海外的高校无法设置ID
            if(cityId != '420100' && cityId != '430100' && cityId != '440100' && cityId != '450100') {
                // 由于观察器的作用，这个时候学校列表已经变成了对应城市的学校列表
                // 从当前学校列表找到与数组第三个元素同名的项的索引
                const schoolId = _.findKey(schoolData[cityId], o => o === value[2]);
                // 没找到，清空学校的值
                if (!schoolId) {
                    this.schoolId = '';
                    return;
                }
                // 找到了，将当前地区设置成对应的ID
                this.schoolId = schoolId;
            }
        }
    }
});