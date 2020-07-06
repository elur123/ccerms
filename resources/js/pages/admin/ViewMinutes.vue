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

                        <a class="navbar-brand" href="#">View Minutes</a>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="title text-center">
                                    Group Minutes <br>
                                    Title/Outline
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Group Name</strong></td>
                                                <td><strong>Research Title</strong></td>
                                                <td><strong>Defense Type</strong></td>
                                                <td><strong>Defense Status</strong></td>
                                                <td><strong>View</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody v-if="getminutes.sched">
                                            <tr v-for="(m,index) in getminutes.sched.data" :key="m.min_id">
                                                <td>{{ m.grp_title }}</td>
                                                <td>{{ m.grp_researchtitle }}</td>
                                                <td>{{ m.styp_title }}</td>
                                                <td>{{ m.ds_title }}</td>
                                                <td>
                                                    <button @click="View(index,1)"
                                                        class="btn btn-info btn-sm btn-round">View</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4 class="title text-center">
                                    Final
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Group Name</strong></td>
                                                <td><strong>Research Title</strong></td>
                                                <td><strong>Defense Type</strong></td>
                                                <td><strong>Defense Status</strong></td>
                                                <td><strong>View</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody v-if="getminutes.sched">
                                            <tr v-for="(m,index) in getminutes.sched2.data" :key="m.min_id">
                                                <td>{{ m.grp_title }}</td>
                                                <td>{{ m.grp_researchtitle }}</td>
                                                <td>Final</td>
                                                <td>{{ m.ds_title }}</td>
                                                <td>
                                                    <button @click="View(index,2)"
                                                        class="btn btn-info btn-sm btn-round">View</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <titleoutline :minutes="minutes" v-if="isTitle == true" />
                                 <final :minutes="minutes" v-if="isFinal == true" />
                                <div class="col-6 mr-auto ml-auto mt-2" v-if="isTitle == true || isFinal == true">
                                    <button class="btn btn-info btn-round btn-block" @click="Close">Close</button>
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
    import TitleOutline from './Capstone1/Minutes/TitleOutline'
    import Final from './Capstone1/Minutes/Final'
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    import moment from 'moment';
    export default {
        props: ['user'],
        data() {
            return {
                minutes: {},

                isTitle: false,
                isFinal: false,

                getminutes: {},
            }
        },
        components: {
            'sidebar': AdminSidebar,
            'titleoutline': TitleOutline,
            'final' : Final
        },
        methods: {
            GetMinutes() {
                let req = {
                    type: '',
                    grp: '',
                    isCaps1: ''
                }
                axios.post('../api/getminutes', req).then(res => {
                    this.getminutes = res.data
                })
            },
            View(index, num) {
                if (num == 1) {
                    this.minutes = this.getminutes.sched.data[index]
                    this.isTitle = true
                    this.isFinal = false
                }
                else {
                    this.minutes = this.getminutes.sched2.data[index]
                    this.isFinal = true
                    this.isTitle = false
                }
            },
            Close() {
                this.isTitle = false
                this.isFinal = false
            },

        },
        computed: {
        },
        created() {
            this.GetMinutes()
        }
    }

</script>
