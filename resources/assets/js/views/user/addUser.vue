<template>
    <div class="addTask">
        <div class="item_add">
            <div class="left el-col-10 el-col-offset-1">
                <!--表单-->
                <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                    <!--用户角色-->
                    <el-form-item label="用户角色" prop="role_id">
                        <el-select v-model="ruleForm.role_id" class="optionBox" @change="isColloeges()">
                            <el-option
                                    v-for="item in rolesList"
                                    :key="item.id"
                                    :label="item.description"
                                    :value="item.id"
                            ></el-option>
                        </el-select>
                    </el-form-item>
                    <!--所属学院-->
                    <el-form-item v-if="isCollege" label="所属学院" prop="college_id">
                        <el-select v-model="ruleForm.college_id" class="optionBox">
                            <el-option
                                    v-for="item in collegesList"
                                    :key="item.id"
                                    :label="item.title"
                                    :value="item.id"></el-option>
                        </el-select>
                    </el-form-item>
                    <!--用户ID-->
                    <el-form-item label="用户名" prop="name">
                        <el-input :disabled="isEdit"  v-model="ruleForm.name" placeholder="请输入用户名(推荐使用工号)"></el-input>
                    </el-form-item>
                    <!--用户名-->
                    <el-form-item label="用户昵称" prop="nickname">
                        <el-input v-model="ruleForm.nickname" placeholder="请输入用户昵称"></el-input>
                    </el-form-item>
                    <!--手机号-->
                    <el-form-item label="手机号码" prop="phone">
                        <el-input v-model="ruleForm.phone" placeholder="请输入手机号码"></el-input>
                    </el-form-item>
                    <!--性别-->
                    <el-form-item label="性别" prop="gender">
                        <div style="margin-left: 25px;">
                            <el-radio v-for="item in genders" :key="item.id" class="radio" v-model="ruleForm.gender" :label="item.gender">{{item.gender_str}}</el-radio>
                        </div>
                    </el-form-item>
                    <!--上传头像-->
                    <el-form-item label="上传头像" prop="picture">
                        <el-upload
                        style="margin-left: 25px;" 
                                class="upload-demo"
                                action="api/upload"
                                :on-success="handleSuccess"
                                >
                            <el-button v-if="!ruleForm.picture" size="small" type="primary">点击上传头像</el-button>
                            <el-button v-else size="small" type="primary">点击修改头像</el-button>
                        </el-upload>
                        <img v-if="ruleForm.picture" style="width:50px;margin-top:20px;height:50px;margin-left:-300px;" width="100%" :src="ruleForm.picture">
                        <span v-else-if="isEdit">您还没有上传过头像哦</span>
                    </el-form-item>
                    <!--邮箱-->
                    <el-form-item label="邮箱" prop="email">
                        <el-input v-model="ruleForm.email" type="email" placeholder="请输入邮箱"></el-input>
                    </el-form-item>
                    <!--是否修改密码按钮-->
                    <button class="isPass el-icon-arrow-down" v-if="!isPass" @click="isPass = true">&emsp;修改密码</button>
                    <!--密码-->
                    <el-form-item label="密码" prop="password" v-if="isPass">
                        <el-input v-model="ruleForm.password" type="password" placeholder="请输入密码"></el-input>
                    </el-form-item>
                    <!--确认密码-->
                    <el-form-item label="确认密码" prop="password_confirmation" v-if="isPass">
                        <el-input v-model="ruleForm.password_confirmation" type="password" placeholder="请输入确认密码"></el-input>
                    </el-form-item>

                    <!--按钮组-->
                    <el-form-item class="btnGroup">
                        <el-button v-if="isEdit" type="primary" @click="editUser('ruleForm')">立即修改</el-button>
                        <el-button v-else type="primary" @click="createUser('ruleForm')">立即创建</el-button>
                        <!-- <el-button @click="resetForm('ruleForm')">重置</el-button> -->
                    </el-form-item>
                </el-form>
            </div>

        </div>
    </div>
</template>
<script>
    export default{
        data () {
            return {
                // 是否显示修改密码
                isPass: true,
                // 是否显示学院选项
                isCollege: false,
                // 是否是修改
                isEdit: false,
                // 学院列表
                collegesList: [],
                // 角色列表
                rolesList: [],
                // 性别
                genders: [
                    {gender_str: '男', gender: false, id: 0},
                    {gender_str: '女', gender: true, id: 1}
                ],
                dialogVisible: false,
                ruleForm: {
                    name: '',
                    nickname: '',
                    email: '',
                    college_id: null,
                    picture: '',
                    gender: null,
                    password: '',
                    phone: null,
                    password_confirmation: '',
                    role_id: null
                },
                rules: {
                    name: [
                        { type: 'string', required: true, message: '请填写用户名或工号', trigger: 'change' }
                    ],
                    nickname:[
                        { type: 'string', required: true, message: '请填写用户昵称', trigger: 'change' }
                    ],
                    email: [
                        { type: 'string', required: true, message: '请填写邮箱', trigger: 'blur' }
                    ],
                    college_id: [
                        { type: 'number', required: true, message: '请选择所属学院', trigger: 'change' }
                    ],
                    gender: [
                        { type: 'boolean', required: true, message: '请选择性别', trigger: 'change' }
                    ],
                    role_id: [
                        { type: 'number', required: true, message: '请选择用户角色', trigger: 'blur' }
                    ],
                    password: [
                        { type: 'string', required: true, message: '请填写密码', trigger: 'blur' }
                    ],
                    password_confirmation: [
                        { type: 'string', required: true, message: '请填写确认密码', trigger: 'blur' }
                    ],
                    phone: [
                        {required: true, message: '请填写手机号码', trigger: 'blur'}
                    ]
                }
            }
        },
        watch: {
            '$route' () {
                this.ruleForm = {
                    name: '',
                    email: '',
                    college_id: null,
                    picture: '',
                    gender: false,
                    phone: null,
                    nickname: '',
                    password: '',
                    password_confirmation: '',
                    role_id: null
                }
                this.$route.name === 'edit_user' ? this.isPass = false : this.isPass = true
                this.$route.name === 'edit_user' ? this.isEdit = true : this.isEdit = false
            }
        },
        mounted () {
            this.getRolesList()
            this.getCollegesList()
            // 修改任务
            if(this.$route.name === 'edit_user'){
                this.isEdit = true
                this.isPass = false
                this.$http.get('user/' + this.$route.params.id + '?include=roles,college').then(res => {
                    // this.ruleForm = res.data.data;
                    this.ruleForm = {
                        name: res.data.data.name,
                        email: res.data.data.email,
                        college_id: res.data.data.college.data.id,
                        picture: res.data.data.picture,
                        gender: res.data.data.gender,
                        phone: res.data.data.phone,
                        nickname: res.data.data.nickname,
                        role_id: res.data.data.roles.data[0].id
                    }
                    this.$diff.save(this.ruleForm)
                    this.rules = {
                        role_id: [
                            { type: 'number', required: true, message: '请选择用户角色', trigger: 'blur' }
                        ],
                        nickname:[
                            { type: 'string', required: true, message: '请填写用户昵称', trigger: 'change' }
                        ],
                        email: [
                            { type: 'string', required: true, message: '请填写邮箱', trigger: 'blur' }
                        ],
                        gender: [
                            { type: 'boolean', required: true, message: '请选择性别', trigger: 'change' }
                        ],
                        password: [
                            { type: 'string', required: true, message: '请填写密码', trigger: 'blur' }
                        ],
                        password_confirmation: [
                            { type: 'string', required: true, message: '请填写确认密码', trigger: 'blur' }
                        ],
                        phone: [
                            {required: true, message: '请填写手机号码', trigger: 'blur'}
                        ]

                    }
                })
            }else if(this.$route.name === 'add_user'){
                this.isEdit = false
                this.isPass = true
            }
        },
        methods: {
            // 创建任务
            createUser (formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.$http.post('user',this.ruleForm).then(res => {
                            this.$message({
                                message: '添加用户成功',
                                type: 'success'
                            })
                            this.$router.push({name: 'user_lists'})
                        }).catch(err => {
                            for(let i in err.response.data.errors){
                                this.$message({
                                  type: 'error',
                                  message: err.response.data.errors[i]
                              })  
                            }
                                                         
                          })
                    } else {
                        return false
                    }
                })
            },
            //判断是否为管理员
            isColloeges(){
                if(this.ruleForm.role_id === 1){
                    this.ruleForm.college_id = null
                    this.isCollege = false
                } else {
                    this.isCollege = true
                }
            },
            // 修改任务
            editUser (formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.$http.post('update_user/' + this.$route.params.id, this.$diff.diff(this.ruleForm)).then(res => {
                            this.$message({
                                message: '修改用户成功',
                                type: 'success'
                            })
                            this.$router.push({name: 'user_lists'})
                        }).catch(err => {
                            for(let i in err.response.data.errors){
                                this.$message({
                                  type: 'error',
                                  message: err.response.data.errors[i]
                              })  
                            }
                                                         
                          })
                    } else {
                        return false
                    }
                })
            },
            // 重置
            resetForm (formName) {
                this.$refs[formName].resetFields()
            },
            // 获取工作类型列表
            getRolesList () {
                this.$http.get('roles').then(res => {
                    this.rolesList = res.data.data
                })
            },
            // 获取学院
            getCollegesList () {
                this.$http.get('colleges').then(res => {
                    this.collegesList = res.data.data
                })
            },
            handlePreview(file) {
                this.ruleForm.picture = file.url
                this.dialogVisible = true
            },
            handleSuccess(response){
                this.ruleForm.picture = response.path
            }
        }
    }
</script>
<style scoped>
    .item_add{
        height:100%;
        background:#fff;
    }
    .left{
        margin-top:30px;
    }
    .el-select{
        float:left;
    }
    .addTask{
        height:100%;
    }
    .radio{
        margin-left:-280px;
    }
    .el-upload>.el-button{
        margin-left:-280px;
    }
    .btnGroup{
        margin-top:20px;
        margin-left:-100px;
    }
    .btnGroup>button{
        margin-right:30px;
    }
    .isPass{
        width:200px;
        cursor:pointer;
        height:30px;
        border:1px solid #1D8CE0;
        background:transparent;
        border-radius:3px;
        color:#1D8CE0;

    }
</style>
