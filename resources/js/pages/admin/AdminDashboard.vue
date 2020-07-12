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

                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>

                    <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation">


                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </nav>
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.student }}
                                                </h3>
                                                <h6 class="stats-title">Number of Students</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Students
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.adviser }}</h3>
                                                <h6 class="stats-title">Number of Adviser</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Adviser
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.st }}</h3>
                                                <h6 class="stats-title">Number of Subject Teacher</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Subject Teacher
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.panel }}</h3>
                                                <h6 class="stats-title">Number of Panel</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Panels
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.group }}</h3>
                                                <h6 class="stats-title">Number of Groups</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Groups
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.archived }}</h3>
                                                <h6 class="stats-title">Number of Research Archived</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Research Archived
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-stat bg-warning">
                            <div class="card-body">
                                <div class="statistics statistics-horizontal">
                                    <div class="info info-horizontal">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon icon-primary icon-circle">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h3 class="info-title">{{ getadminDashboard.sched }}</h3>
                                                <h6 class="stats-title">Schedule for Today</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="stats">
                                    View Schedules
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Capstone 1 Progress</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <caps1 v-if="getadminDashboard.c1" :getadminDashboard="getadminDashboard.c1"></caps1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Capstone 2 Progress</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <caps2 v-if="getadminDashboard.c2" :getadminDashboard="getadminDashboard.c2"></caps2>
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
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    import Capstone1 from './Graph/Capstone1'
    import Capstone2 from './Graph/Capstone2'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdminSidebar,
            'caps1': Capstone1,
            'caps2': Capstone2
        },
        methods: {
            ...mapActions(["fetchadminDashboard", "fetchDependencies"])
        },
        computed: mapGetters(['getadminDashboard']),
        created() {
            this.fetchadminDashboard();
            this.fetchDependencies();
        }
    }

</script>
