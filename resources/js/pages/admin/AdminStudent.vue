<template>
    <div>
        <sidebar :user="user"></sidebar>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>

                        <a class="navbar-brand" href="#">Student</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                </div>
            </nav>
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="create">
                            <div class="card-header">
                                <h4 v-if="isUdate == false" class="card-title">Create New Student</h4>
                                <h4 v-if="isUdate == true" class="card-title">Update Student</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <div class="form-group">
                                            <input v-model="name" type="text" class="form-control"
                                                placeholder="Input Student Fullname">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{error.name}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input v-model="email" type="email" class="form-control" placeholder="Input Student Email">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{error.email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input v-model="password" type="password" class="form-control"
                                                placeholder="Input Student Password">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{error.password}}</p>
                                        <p v-if="isUdate == true" style="font-size:12px;color:red;">Leave blank the password if you will not update</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Course</label>
                                        <div class="form-group">
                                            <select class="form-control" v-model="course">
                                                <option v-for="course in getdependencies.studCourse"
                                                    :key="course.crs_id" :value="course.crs_id">{{ course.crs_title }}
                                                </option>
                                            </select>
                                        </div>
                                        <p style="font-size:12px;color:red;">{{error.course}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mr-auto ml-auto">
                                        <button v-if="isUdate == false" class="btn btn-info btn-block btn-round" @click="CreateStudent" :disabled="isCreating == true">
                                            <i v-if="isCreating == false" class="fas fa-users-cog" ></i>
                                            <span v-if="isCreating == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Create Student
                                        </button>
                                        <button v-if="isUdate == true" class="btn btn-info btn-block btn-round" @click="UpdateStudent" :disabled="isUpdating == true">
                                            <i v-if="isUpdating == false" class="fas fa-users-cog" ></i>
                                            <span v-if="isUpdating == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Update Student
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Student List</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label>Sort By Course:</label>
                                        <select class="custom-select form-control form-control-sm" v-model="searching.course">
                                            <option v-for="course in getdependencies.studCourse" :key="course.crs_id"
                                                :value="course.crs_id">{{ course.crs_title }}</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Sort By Status:</label>
                                        <select class="custom-select form-control form-control-sm" v-model="searching.status">
                                            <option v-for="status in getdependencies.userStatus" :key="status.us_id"
                                                :value="status.us_id">{{ status.us_title }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Search</label>
                                        <input type="text" class="form-control form-control" @keyup="SearchStudent" v-model="searching.search"
                                            placeholder="Enter Student Name ...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hovered">
                                                <thead class="text-info">
                                                    <tr>
                                                        <th><strong>Name</strong></th>
                                                        <th><strong>Email</strong></th>
                                                        <th><strong>Course</strong></th>
                                                        <th><strong>Group</strong></th>
                                                        <th><strong>Status</strong></th>
                                                        <th><strong>Action</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(student,index) in getstudentdata.data" :key="student.id">
                                                        <td><text-highlight :queries="searching.search">{{ student.name }}</text-highlight></td>
                                                        <td>{{ student.email }}</td>
                                                        <td>{{ student.crs_title }}</td>
                                                        <td>{{ student.grp_title }}</td>
                                                        <td>{{ student.us_title }}</td>
                                                        <td>
                                                            <button v-if="student.us_id == 3 || student.us_id == 2"
                                                                @click="Decission(1,student.id,student.name,student.email)"
                                                                :disabled="isloading == true"
                                                                class="btn btn-info btn-round btn-sm btn-block">
                                                                <i v-if="isloading == false" class="fas fa-plus-circle"></i>
                                                                 <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                 Approve
                                                            </button>
                                                            <button v-if="student.us_id == 1 || student.us_id == 3"
                                                                @click="Decission(2,student.id,student.name,student.email)"
                                                                :disabled="isloading == true"
                                                                class="btn btn-primary btn-round btn-sm btn-block mt-1">
                                                                <i v-if="isloading == false" class="fas fa-minus-circle"></i>
                                                                <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                Disapprove
                                                            </button>
                                                            <a v-if="student.us_id == 1" href="#create" @click="getToUpdate(index)"
                                                                class="btn btn-success btn-round btn-sm btn-block mt-1 text-white"><i
                                                                    class="fas fa-user-edit"></i> Update</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <pagination :data="getstudentdata"
                                                        @pagination-change-page="Paginate" :limit=5>
                                                    </pagination>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AdminSidebar from './AdminSidebar'
    import TextHighlight from 'vue-text-highlight';
    import _ from 'lodash';
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdminSidebar,
            'text-highlight': TextHighlight
        },
        data() {
            return {
                name:'',
                email:'',
                password:'',
                course:'',

                isCreating:false,
                isloading: false,
                isUpdating: false,
                isUdate:false,

                error:{
                    name:'',
                    email:'',
                    password:'',
                    course:''
                },

                searching: {
                    course:1,
                    status:1,
                    search:'',
                },

                student:{}
            }
        },
        methods: {
            SearchStudent: _.debounce(function(){
                if(this.searching.search == ''){
                    this.fetchstudentdata()
                }
                else{
                    this.searchStudent(this.searching);
                }
            },3000),
            Paginate(page = 1) {
                this.paginatestudent(page)
            },
            CreateStudent(){
                if(this.name == ''){

                    this.error.name = 'Please Provide a fullname'
                    if(this.email != ''){
                        this.error.email = ''
                    }
                    if(this.password != ''){
                        this.error.password = ''
                    }
                    if(this.course != ''){
                        this.error.course = ''
                    }
                }
                else if(this.email == ''){
                    this.error.email = 'Please Provide a valid email'
                    if(this.name != ''){
                        this.error.name = ''
                    }
                    if(this.password != ''){
                        this.error.password = ''
                    }
                    if(this.course != ''){
                        this.error.course = ''
                    }
                }
                else if(this.password == ''){
                    this.error.password = 'Please Provide a password'
                    if(this.email != ''){
                        this.error.email = ''
                    }
                    if(this.name != ''){
                        this.error.name = ''
                    }
                    if(this.course != ''){
                        this.error.course = ''
                    }
                }
                else if(this.course == ''){
                    this.error.course = 'Please Select a Course'
                    if(this.email != ''){
                        this.error.email = ''
                    }
                    if(this.password != ''){
                        this.error.password = ''
                    }
                    if(this.name != ''){
                        this.error.name = ''
                    }
                }
                else{
                    this.isCreating = true
                    axios.post('../api/CreateStudent',{
                        name:this.name,
                        email:this.email,
                        password:this.password,
                        crs_id:this.course
                    }).then(res => {
                        if(res.data.message == 'success'){
                            this.Clear()
                            this.isCreating = false
                            this.Alert('success', 'Successfully Created')
                        }
                        else{
                            this.isCreating = false
                            this.Alert('info', res.data.message)
                        }

                    })
                }


            },
            getToUpdate(index){
                this.error = {
                    name: '',
                    email:'',
                    password:'',
                    course:'',
                }
                this.isUdate = true
                this.student = this.getstudentdata.data[index]
                this.name = this.student.name
                this.email = this.student.email
                this.course = this.student.crs_id
            },
            UpdateStudent(){
                var datas = {}
                if(this.password == ''){
                    datas = {
                        id: this.student.id,
                        type: 'update',
                        name: this.name,
                        email: this.email,
                        password: '',
                        crs_id: this.course
                    }
                }
                else{
                    datas = {
                        id: this.student.id,
                        name: this.name,
                        type:'update',
                        email: this.email,
                        password: this.password,
                        crs_id: this.course
                    }
                }
                this.isUpdating = true
                axios.post('../api/updatestudent', datas).then(res => {
                    if(res.data.message == 'success'){
                        this.isUdate = false
                        this.isUpdating = false
                        this.Alert('success', 'Successfully Updated')
                        this.Clear()
                    }
                    else{
                        this.isUpdating = false
                        this.Alert('info', res.data.message)
                    }
                })
            },
            Decission(str, id, name, email) {
                this.isloading = true
                if (str == 1) {
                    const data = {
                        type: 'approval',
                        id: id,
                        email: email,
                        name: name,
                        us_id: 1
                    }
                    axios.post('../api/updatestudent', data).then(res => {
                        if (res.data.message == 'success') {
                            this.isloading = false
                            this.Clear()
                            this.Alert('info', 'Successfully Approve')
                        } else {
                            this.isloading = false
                            this.Alert('info', res.data.message)
                        }
                    })
                } else {
                    const data = {
                        type: 'approval',
                        email: email,
                        name: name,
                        id: id,
                        us_id: 2
                    }
                    axios.post('../api/updatestudent', data).then(res => {
                        if (res.data.message == 'success') {
                            this.isloading = false
                            this.Clear()
                            this.Alert('info', 'Successfully Disapprove')
                        } else {
                            this.isloading = false
                            this.Alert('info', res.data.message)
                        }
                    })
                }
            },
            Alert(icon, title) {
                toast.fire({
                    icon: icon,
                    title: title,
                })
            },
           Clear(){
               this.name = '',
               this.email = '',
               this.password = '',
               this.course = '',

               this.error = {
                    name: '',
                    email:'',
                    password:'',
                    course:'',
                }
                this.student = {}
                this.fetchstudentdata();
           },
            ...mapActions(["fetchDependencies", "fetchstudentdata","searchStudent","paginatestudent"])
        },
        created() {
            this.fetchDependencies();
            this.fetchstudentdata();
        },
        computed: mapGetters(['getdependencies', 'getstudentdata']),
    }

</script>
