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

                        <a class="navbar-brand" href="#">Research Personnel</a>
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
                        <div class="card">
                            <div class="card-header" id="update">
                                <h4 v-if="isUpdate == false" class="card-title">Create New Research Personnel</h4>
                                <h4 v-if="isUpdate == true" class="card-title">Update Research Personnel</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <div class="form-group">
                                            <input type="text" v-model="rp.name" class="form-control"
                                                placeholder="Input Research Personnel Fullname">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="email" v-model="rp.email" class="form-control"
                                                placeholder="Input Research Personnel Email">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="password" v-model="rp.password" class="form-control"
                                                placeholder="Input Research Personnel Password">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.password }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Specialization</label>
                                        <div class="form-group">
                                            <input type="text" v-model="rp.specialty" class="form-control"
                                                placeholder="Input Research Personnel Specialty">
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.specialty }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Type</label>
                                        <div class="form-group">
                                            <select class="form-control" v-model="rp.typ_id">
                                                <option v-for="type in getdependencies.userTypes" :key="type.typ_id"
                                                    :value="type.typ_id">{{ type.typ_title }}</option>
                                            </select>
                                        </div>
                                        <p style="font-size:12px;color:red;">{{ errors.typ_id }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mr-auto ml-auto">
                                        <button v-if="isUpdate == false" @click="CreateRP" :disabled="isloading == true"
                                            class="btn btn-info btn-block btn-round">
                                            <i v-if="isloading == false" class="fas fa-users-cog"></i>
                                            <span v-if="isloading == true" class="spinner-grow spinner-grow-sm"
                                                role="status" aria-hidden="true"></span>
                                            Create Research Personnel
                                        </button>
                                        <button v-if="isUpdate == true" @click="UpdateRP" :disabled="isloading == true"
                                            class="btn btn-info btn-block btn-round">
                                            <i v-if="isloading == false" class="fas fa-users-cog"></i>
                                            <span v-if="isloading == true" class="spinner-grow spinner-grow-sm"
                                                role="status" aria-hidden="true"></span>
                                            Update Research Personnel
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
                                        <select class="custom-select form-control form-control" v-model="searching.status">
                                            <option v-for="status in getdependencies.userStatus" :key="status.us_id"
                                                :value="status.us_id">{{ status.us_title }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Search</label>
                                        <input type="text" class="form-control form-control" @keyup="Search" v-model="searching.search"
                                            placeholder="Enter Research Personnel...">
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
                                                        <th><strong>Type</strong></th>
                                                        <th><strong>Status</strong></th>
                                                        <th><strong>Action</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(rp, index) in getrpdata.data" :key="rp.id">
                                                        <td><text-highlight :queries="searching.search">{{ rp.name }}</text-highlight></td>
                                                        <td>{{ rp.email }}</td>
                                                        <td>{{ rp.specialty }}</td>
                                                        <td>{{ rp.typ_title }}</td>
                                                        <td>{{ rp.us_title }}</td>
                                                        <td>
                                                            <button @click="Decission(index, 1)"
                                                                v-if="rp.us_id == 3 || rp.us_id == 2"
                                                                class="btn btn-info btn-round btn-sm btn-block">
                                                                <i class="fas fa-plus-circle"></i>
                                                                Approve
                                                            </button>
                                                            <button @click="Decission(index, 2)"
                                                                v-if="rp.us_id == 1 || rp.us_id == 3"
                                                                class="btn btn-primary btn-round btn-sm btn-block mt-1">
                                                                <i v-if="isloading == false"
                                                                    class="fas fa-minus-circle"></i>
                                                                <span v-if="isloading == true"
                                                                    class="spinner-grow spinner-grow-sm" role="status"
                                                                    aria-hidden="true"></span>
                                                                Disapprove
                                                            </button>
                                                            <a href="#update" v-if="rp.us_id == 1"
                                                                @click="showUpdate(index)"
                                                                class="btn btn-success btn-round btn-sm btn-block mt-1 text-white"><i
                                                                    class="fas fa-user-edit"></i>
                                                                Update
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                     <pagination :data="getrpdata"
                                                        @pagination-change-page="Paginate" :limit=5>
                                                    </pagination>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="mdlAcceptRP">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center bg-info">
                                                <h4 class="title title-up">Approve As</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-10 mr-auto ml-auto">
                                                        <div class="form-group">
                                                            <label>Personnel Type</label>
                                                            <select class="form-control" v-model="rp.typ_id">
                                                                <option v-for="type in getdependencies.userTypes" :key="type.typ_id"
                                                                    :value="type.typ_id">{{ type.typ_title }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mr-auto ml-auto">
                                                        <button @click="AcceptRP"
                                                            class="btn btn-info btn-round btn-block"
                                                            :disabled="isloading == true"><span v-if="isloading == true"
                                                                class="spinner-grow spinner-grow-sm" role="status"
                                                                aria-hidden="true"></span>Accept</button>
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
            </div>
        </div>
    </div>
</template>
<script>
    import AdminSidebar from './AdminSidebar'
    import TextHighlight from 'vue-text-highlight';
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
                rp: {
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    specialty: '',
                    typ_id: 2,
                    us_id: '',
                    type: '',
                },

                searching: {
                    search: '',
                    status: 1
                },

                errors: {},
                isloading: false,
                isUpdate: false,

                personnel: {},
            }
        },
        methods: {
             Search: _.debounce(function(){
                if(this.searching.search == ''){
                    this.fetchrpdata()
                }
                else{
                    this.searchRP(this.searching);
                }
            },3000),
            Paginate(page = 1){
                this.paginaterp(page)
            },
            CreateRP() {
                this.isloading = true
                axios.post('../api/createRP', this.rp).then(res => {
                    if (res.data.message == 'success') {
                        this.isloading = false
                        this.Clear()
                        this.Alert('success', 'Successfully Created')
                    } else {
                        this.isloading = false
                        this.Alert('info', res.data.message)
                    }
                }).catch(err => {
                    this.isloading = false
                    if (err.response.status == 422) {
                        this.errors = err.response.data.errors
                    }
                })
            },
            Decission(index, us_id) {
                this.personnel = this.getrpdata.data[index];
                this.rp = {
                    id: this.personnel.id,
                    name: this.personnel.name,
                    email: this.personnel.email,
                    typ_id: this.personnel.typ_id,
                    type: 'approval',
                    us_id: us_id
                }
                if (us_id == 1) {
                    $('#mdlAcceptRP').modal('show')
                } else {
                    this.isloading = true
                    axios.post('../api/updateRP', this.rp).then(res => {
                        if (res.data.message == 'success') {
                            this.isloading = false
                            this.Alert('success', 'Successfully Disapproved')
                            this.Clear()
                        } else {
                            this.isloading = true
                            this.Alert('info', res.data.message)
                        }
                    })
                }
            },
            AcceptRP(){
                this.isloading = true
                 axios.post('../api/updateRP', this.rp).then(res => {
                        if (res.data.message == 'success') {
                             $('#mdlAcceptRP').modal('hide')
                            this.isloading = false
                            this.Alert('success', 'Successfully Approved')
                            this.Clear()
                        } else {
                            this.isloading = true
                            this.Alert('info', res.data.message)
                        }
                })
            },
            showUpdate(index) {
                this.isUpdate = true
                this.errors.password = 'Leave Blank if you will not change the password'
                this.personnel = this.getrpdata.data[index];
                this.rp = {
                    id: this.personnel.id,
                    name: this.personnel.name,
                    email: this.personnel.email,
                    specialty: this.personnel.specialty,
                    typ_id: this.personnel.typ_id,
                    type: 'update'
                }
            },
            UpdateRP() {
                this.isloading = true
                axios.post('../api/updateRP', this.rp).then(res => {
                    if (res.data.message == 'success') {
                        this.isloading = false
                        this.isUpdate = false
                        this.Clear()
                        this.Alert('success', 'Successfully Created')
                        this.errors = {}
                    } else {
                        this.Alert('info', res.data.message)
                        this.isloading = false
                    }
                }).catch(err => {
                    this.isloading = false
                    if (err.response.status == 422) {
                        this.errors = err.response.data.errors
                        this.errors.password = 'Leave Blank if you will not change the password'
                    }
                })
            },
            Clear() {
                this.personnel = {}
                this.rp = {
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    specialty: '',
                    typ_id: 2,
                    us_id: '',
                    type: '',
                }
                this.fetchrpdata()
            },
            Alert(icon, title) {
                toast.fire({
                    icon: icon,
                    title: title,
                })
            },
            ...mapActions(["fetchDependencies", "fetchrpdata", "searchRP", "paginaterp"])
        },
        computed: mapGetters(['getdependencies', 'getrpdata']),
        created() {
            this.fetchDependencies()
            this.fetchrpdata()
        },
    }

</script>
