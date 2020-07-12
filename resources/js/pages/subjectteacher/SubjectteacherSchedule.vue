<template>
    <div>
        <sidebar :user="user"></sidebar>
        <div class="main-panel" id="main-panel">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="sched in getdefenseschedule.data" :key="sched.def_id">
                                                        <td><text-highlight :queries="searching.grp">{{ sched.grp_title }}</text-highlight></td>
                                                        <td>{{ sched.styp_title }}</td>
                                                        <td>{{ sched.def_date }}</td>
                                                        <td>{{ sched.def_stime }} - {{ sched.def_etime }}</td>
                                                        <td>{{ sched.def_address }}</td>
                                                        <td>{{ sched.ds_title }}</td>
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
    import AdminSidebar from './SubjectteacherSidebar'
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
