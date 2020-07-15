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

                        <a class="navbar-brand" href="#">Subject Teacher</a>
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
                        <div class="card" id="update">
                            <div class="card-header">
                                <h4 v-if="isUpdate == false" class="card-title">Create New Subject Teacher</h4>
                                <h4 v-if="isUpdate == true" class="card-title">Update Subject Teacher</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <div class="form-group">
                                            <input type="text" v-model="st.name" class="form-control" placeholder="Input Subject Teacher Fullname">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="email" v-model="st.email" class="form-control" placeholder="Input Subject Teacher Email">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="password" v-model="st.password" class="form-control" placeholder="Input Subject Teacher Password">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.password }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Specialty</label>
                                        <div class="form-group">
                                            <input type="text" v-model="st.specialty" class="form-control" placeholder="Input Subject Teacher Specialty">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.specialty }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mr-auto ml-auto">
                                        <button v-if="isUpdate == false" @click="CreateST" :disabled="isloading == true" class="btn btn-info btn-block btn-round">
                                            <i v-if="isloading == false" class="fas fa-users-cog"></i>
                                            <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Create Subject Teacher
                                        </button>

                                        <button v-if="isUpdate == true" @click="UpdateST" :disabled="isloading == true" class="btn btn-info btn-block btn-round">
                                            <i v-if="isloading == false" class="fas fa-users-cog"></i>
                                             <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Update Subject Teacher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Subject Teacher List</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label>Sort By Status:</label>
                                        <select class="custom-select  form-control form-control-sm" v-model="searching.status">
                                            <option v-for="status in getdependencies.userStatus" :key="status.us_id" :value="status.us_id">{{ status.us_title }}</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Search</label>
                                        <input type="text"  @keyup="Search" v-model="searching.search" class="form-control form-control" placeholder="Enter Subject Teacher...">
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
                                                        <th><strong>Specialization</strong></th>
                                                        <th><strong>Status</strong></th>
                                                        <th><strong>Action</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(st,index) in getstdata.data" :key="st.id">
                                                        <td><text-highlight :queries="searching.search">{{ st.name }}</text-highlight></td>
                                                        <td>{{ st.email }}</td>
                                                        <td>{{ st.specialty }}</td>
                                                        <td>{{ st.us_title }}</td>
                                                        <td>
                                                            <button @click="Decission(index, 1)" :disabled="isloading == true" v-if="st.us_id == 3 || st.us_id == 2" class="btn btn-info btn-round btn-sm btn-block">
                                                                <i v-if="isloading == false" class="fas fa-plus-circle"></i>
                                                                 <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                 Approve
                                                            </button>
                                                            <button @click="Decission(index, 2)" :disabled="isloading == true" v-if="st.us_id == 1 || st.us_id == 3" class="btn btn-primary btn-round btn-sm btn-block mt-1">
                                                                <i v-if="isloading == false" class="fas fa-minus-circle"></i>
                                                                <span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                Disapprove
                                                            </button>
                                                            <a href="#update" v-if="st.us_id == 1" @click="showUpdate(index)" class="btn btn-success btn-round btn-sm btn-block mt-1 text-white"><i
                                                                class="fas fa-user-edit"></i>
                                                                Update
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                     <pagination :data="getstdata"
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
import {mapGetters, mapActions} from 'vuex'
import TextHighlight from 'vue-text-highlight';
export default {
    props: ['user'],
    components: {
            'sidebar': AdminSidebar,
            'text-highlight': TextHighlight
    },
    data(){
        return{
            st:{
                id:'',
                name:'',
                email:'',
                password:'',
                specialty:'',
                us_id:'',
                type:'',
            },

            searching:{
                search:'',
                status:1
            },

            errors: {},
            isloading:false,
            isUpdate:false,

            subteacher:{},
        }
    },
    methods:{
        SendEmail(to, subject, message){
                Email.send({
                    SecureToken :"21691b39-e134-40cd-86dd-da6081f54e65",
                    To : to,
                    From : "umccerms@gmail.com",
                    Subject : subject,
                    Body : message
                }).then()
        },
        CreateST(){
            const subject = "Account Created"
            const body = "Your Email is Created by the RC. Login to wwww.ccerms.online and use this credentials: <br>"
                        +"Email: "+this.st.email+" <br> Password: "+this.st.password
            this.isloading = true
            axios.post('../api/createST', this.st).then(res =>{
               if (res.data.message == 'success') {
                   this.isloading = false
                   this.Alert('success', 'Successfully Created');
                   this.SendEmail(this.st.email, subject, body)
                   this.Clear()

               }
               else{
                   this.isloading = false
                   this.Alert('infro', res.data.message)
               }
            }).catch(err => {
                this.isloading = false
                if(err.response.status == 422){
                   this.errors = err.response.data.errors
                }
            })
        },
        showUpdate(index){
            this.isUpdate = true
            this.subteacher = this.getstdata.data[index]
            this.st = {
                id: this.subteacher.id,
                name: this.subteacher.name,
                email: this.subteacher.email,
                password: '',
                specialty: this.subteacher.specialty,
                type:'update',

            }
            this.errors.password = 'Leave Blank if you will not change the password'
        },
        UpdateST(){
            const subject = "Account Updated"
            const body = "Your Account is Updated by the RC. Contact the RC for more Information"
            this.isloading = true
            axios.post('../api/updateST', this.st).then(res => {
                if(res.data.message == 'success'){
                    this.isloading = false
                    this.isUpdate = false
                    this.Alert('success', 'Successfully Updated')
                    this.SendEmail(this.st.email, subject, body)
                    this.Clear()
                }
                else{
                    this.isloading = false
                    this.Alert('info', res.data.message)
                }
            }).catch(err => {
                this.isloading = false
                if(err.response.status == 422){
                    this.errors = err.response.data.errors
                }
            })
        },
        Decission(index,us_id){
            const subject = "Account Status"
            const body = "Please Contact the RC for more information for youre account."
            this.isloading = true
            this.subteacher = this.getstdata.data[index]
            this.st = {
                id: this.subteacher.id,
                name: this.subteacher.name,
                email: this.subteacher.email,
                type:'approval',
                us_id: us_id
            }
             axios.post('../api/updateST', this.st).then(res => {
                if(res.data.message == 'success'){
                    this.isloading = false
                    this.Alert('success', 'Successfully Updated')
                    this.SendEmail(this.st.email, subject, body)
                    this.Clear()
                }
                else{
                    this.isloading = false
                    this.Alert('info', res.data.message)
                }
            })
        },
        Search: _.debounce(function(){
            if(this.searching.search == ''){
                this.fetchstdata()
            }
            else{
                this.searchST(this.searching);
            }
        },3000),
        Paginate(page = 1){
            this.paginatest(page)
        },
        Clear(){
            this.errors = {}
            this.st = {
                name: '',
                email:'',
                password:'',
                specialty:''
            }
            this.fetchstdata()
        },
        Alert(icon, title) {
            toast.fire({
                icon: icon,
                title: title,
            })
        },
        ...mapActions(["fetchDependencies","fetchstdata","searchST","paginatest"])
    },
    computed: mapGetters(['getdependencies','getstdata']),
    created(){
        this.fetchDependencies()
        this.fetchstdata()
    }
}
</script>
