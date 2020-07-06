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

                        <a class="navbar-brand" href="#">Schedule</a>
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
                            <div class="card-header">
                                <h4 class="card-title">Create New Defense Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="text-center">Type</label>
                                        <div class="form-group">
                                            <select class="form-control" v-model="typ_id" @change="ChangeDefenseType">
                                                <option v-for="type in getdependencies.schedType" :key="type.styp_id"
                                                    :value='type.styp_id'>{{type.styp_title}}</option>
                                            </select>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-center">Group</label>
                                        <div class="form-group">
                                            <select class="form-control" v-model="grp_id">
                                                <option v-for="group in groups" :key="group.grp_id"
                                                    :value="group.grp_id">{{ group.grp_title }}</option>
                                            </select>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.group }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-center">Venuye</label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Add the Defense Venue" class="form-control" v-model="venue">
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.venue }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <datetime id="date" format="MM/DD/YYYY" v-model="date"></datetime>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.date }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Start Time</label>
                                        <div class="form-group">
                                            <datetime id="stime" format="h:i" v-model="stime"></datetime>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.stime }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label>End Time</label>
                                        <div class="form-group">
                                            <datetime id="etime" format="h:i" v-model="etime"></datetime>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.etime }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-center">Status</label>
                                        <div class="form-group">
                                            <select class="form-control" v-model="ds_id" :disabled="isUpdate == false">
                                                <option v-for="status in getdependencies.defStatus" :key="status.ds_id"
                                                    :value="status.ds_id">{{ status.ds_title }}</option>
                                            </select>
                                        </div>
                                        <p style="font-size:12px;color:red">{{ error.status }}</p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mr-auto ml-auto">
                                        <button v-if="isUpdate == false" @click="CreateSchedule" class="btn btn-info btn-block btn-round "><i
                                                class="fas fa-calendar-alt"></i> Create Schedule</button>
                                        <button v-if="isUpdate == true" @click="UpdateSchedule" class="btn btn-info btn-block btn-round "><i
                                                class="fas fa-calendar-alt"></i> Update Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Defense Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Sort By Type:</label>
                                        <select class="custom-select form-control form-control-sm" v-model="searching.type">
                                            <option v-for="type in getdependencies.schedType" :key="type.styp_id"
                                                :value="type.styp_id">{{ type.styp_title }}</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Search</label>
                                        <input type="text" class="form-control form-control" @keyup="SearchGroups"
                                            placeholder="Input Group Name..." v-model="searching.grp">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hovered">
                                                <thead class="text-info">
                                                    <tr>
                                                        <td><strong>Group Name</strong></td>
                                                        <td><strong>Defense Type</strong></td>
                                                        <td><strong>Defense Date</strong></td>
                                                        <td><strong>Defense Time</strong></td>
                                                        <td><strong>Defense Venue</strong></td>
                                                        <td><strong>Defense Status</strong></td>
                                                        <td><strong>Action</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(sched,index) in getdefenseschedule.data" :key="sched.def_id">
                                                        <td><text-highlight :queries="searching.grp">{{ sched.grp_title }}</text-highlight></td>
                                                        <td>{{ sched.styp_title }}</td>
                                                        <td>{{ sched.def_date }}</td>
                                                        <td>{{ sched.def_stime }} - {{ sched.def_etime }}</td>
                                                        <td>{{ sched.def_address }}</td>
                                                        <td>{{ sched.ds_title }}</td>
                                                        <td>
                                                            <button v-if="sched.def_status == 1" @click="SelectUpdate(index)" class="btn btn-info btn-round btn-sm">Update</button>
                                                            <button v-else class="btn btn-info btn-link" disabled>No Action</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <pagination :data="getdefenseschedule"
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
    import datetime from 'vuejs-datetimepicker';
    import TextHighlight from 'vue-text-highlight';
    import _ from 'lodash';
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    import moment from 'moment';
    export default {
        props: ['user'],
        data() {
            return {
                typ_id: 2,
                grp_id: '',
                stime:'',
                etime:'',
                venue: '',
                ds_id: 1,

                idtoUpdate: '',

                error: {},
                loading: false,
                isUpdate: false,

                groups: {},
                searching:{
                    grp: '',
                    type: 2
                },
                date: moment(Date.now()).format('MM/DD/YYYY')
            }
        },
        components: {
            'sidebar': AdminSidebar,
            'text-highlight': TextHighlight,
            datetime
        },
        methods: {
            ChangeDefenseType() {
                axios.get('../api/getgroupsfordefense/' + this.typ_id).then(res => {
                    this.groups = res.data.groups
                })
            },
            SearchGroups: _.debounce(function(){
                if (this.searching.grp == '') {
                   this.fetchdefenseschedule()
                }
                else{
                    this.searchdefenseschedule(this.searching)
                }
            }, 2000),
            Paginate(page = 1){
                this.paginatedefenseschedule(page)
            },
            CreateSchedule(){
                this.loading = true
                this.date =  moment(this.date).format('YYYY-MM-DD')
                axios.post('../api/createdefenseschedule', {
                    type: this.typ_id,
                    date: this.date,
                    stime: this.stime,
                    group: this.grp_id,
                    etime: this.etime,
                    venue: this.venue,
                    status: this.ds_id
                }).then(res => {
                    if(res.data.message == 'success' ){
                        this.Clear()
                        this.error = {}
                    }
                    else{
                        this.Alert('info', res.data.message)
                        this.loading = false
                        this.date = moment(Date.now()).format('MM/DD/YYYY')
                        this.grp = 2
                        this.venue = ''
                    }
                }).catch(err => {
                    if(err.response.status == 422){
                         this.date = moment(Date.now()).format('MM/DD/YYYY')
                        this.error = err.response.data.errors
                    }
                })
            },
            UpdateSchedule(){
                this.loading = true
                this.date =  moment(this.date).format('YYYY-MM-DD')
                axios.post('../api/updatedefenseschedule', {
                    def_id : this.idtoUpdate,
                    type: this.typ_id,
                    date: this.date,
                    group: this.grp_id,
                    stime: this.stime,
                    etime: this.etime,
                    venue: this.venue,
                    status: this.ds_id
                }).then(res => {
                    if(res.data.message == 'success' ){
                        this.Clear()
                        this.isUpdate = false
                    }
                    else{
                        this.Alert('info', res.data.message)
                        this.loading = false
                         this.date = moment(Date.now()).format('MM/DD/YYYY')
                    }
                }).catch(err => {
                    if(err.response.status == 422){
                         this.date = moment(Date.now()).format('MM/DD/YYYY')
                        this.error = err.response.data.errors
                    }
                })
            },
            SelectUpdate(index){
                this.isUpdate = true
                this.idtoUpdate = this.getdefenseschedule.data[index].def_id
                this.grp_id = this.getdefenseschedule.data[index].grp_id
                this.typ_id = this.getdefenseschedule.data[index].styp_id
                this.venue = this.getdefenseschedule.data[index].def_address
                this.stime = this.getdefenseschedule.data[index].def_stime
                this.etime = this.getdefenseschedule.data[index].def_etime
                this.date = moment(this.getdefenseschedule.data[index].def_date).format('MM/DD/YYYY')

                this.ChangeDefenseType()
            },
            Clear(){
                    this.typ_id = 2
                    this.grp_id = ''
                    this.stime = ''
                    this.etime = ''
                    this.venue =  ''
                    this.ds_id = 1
                    this.date = moment(Date.now()).format('MM/DD/YYYY')
                    this.loading = false
                    this.Alert('success', 'Successfully Created')
                    this.fetchdefenseschedule()
            },
            Alert(icon, title) {
                toast.fire({
                    icon: icon,
                    title: title,
                })
            },
            ...mapActions(["fetchDependencies", "fetchdefenseschedule","searchdefenseschedule","paginatedefenseschedule"])
        },
        computed: mapGetters(['getdependencies', 'getdefenseschedule']),
        created() {
            this.fetchDependencies()
            this.fetchdefenseschedule()
            this.ChangeDefenseType(this.typ_id)
        }
    }

</script>
