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

                        <a class="navbar-brand" href="#">Research Personnel Report</a>
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
                <div class="row" style="margin-top:-30px;">
                    <div class="col-md-6 mr-auto ml-auto">
                        <button class="btn btn-info btn-round btn-block" @click="print">Print</button>
                    </div>
                </div>
            </div>
            <div class="content" id="printMe">
                <div class="card">
                    <div class="card-body">
                        <div class="row ph">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="/assets/img/um.jpg" alt="umbanner">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="font-weight-bold" style="text-align:right">College of Computing
                                            Education</p>
                                        <p class="font-italic" style="text-align:right">
                                        3rd Floor, DPT Building <br>
                                        Matina Campus, Davao City <br>
                                        Telefax: (082) <br>
                                        Phone No: (082)300-5456/300-0645 to 48 Local 116
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 font-weight-bold">
                                16500 - {{ getYear() }} - {{ getDate() }}/rev 0
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <h4 class="title text-center">List of Research Personnel Report</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p style="font-size:15px;" class="font-weight-bold">Panel</p>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Name</strong></td>
                                                            <td><strong>Specialization</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="p in rp.panel" :key="p.id">
                                                            <td>{{ p.name }}</td>
                                                            <td>{{ p.specialty }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p style="font-size:15px;" class="font-weight-bold">Adviser</p>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Name</strong></td>
                                                            <td><strong>Specialization</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="a in rp.adviser" :key="a.id">
                                                            <td>{{ a.name }}</td>
                                                            <td>{{ a.specialty }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container row">
                                        <div class="col-md-6">
                                            <p>Prepared By</p>
                                            <p class="text-center">{{ user.name }}</p>
                                            <p class="border-top text-center">Research Coordinator</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Noted By</p>
                                            <p class="text-center">Ramciz N. Vilchez, DIT</p>
                                            <p class="text-center border-top">Dean</p>
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
    import AdminSidebar from '../AdminSidebar'
    import moment from 'moment'
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdminSidebar,
        },
        data(){
            return{
                rp : {
                    adviser:{},
                    panel:{}
                }
            }
        },
        methods: {
            GetReport(){
                axios.get('../api/getresearchperson').then(res => {
                    this.rp.adviser = res.data.adviser
                    this.rp.panel = res.data.panel
                })
            },
            print() {
                this.$htmlToPaper('printMe');
            },
            getDate() {
                var date = moment(Date.now()).format('MMDD')
                return date
            },
            getYear() {
                var year = moment(Date.now()).format('YYYY')
                return year
            },
            ...mapActions(["fetchadminDashboard", "fetchDependencies"])
        },
        computed: mapGetters(['getadminDashboard']),
        created() {
            this.GetReport()
            this.fetchadminDashboard();
            this.fetchDependencies();
        }
    }

</script>
<style scoped>
    .ph {
        border-bottom-style: solid;
    }
</style>
