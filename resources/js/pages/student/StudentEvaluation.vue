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

                        <a class="navbar-brand" href="#">Student Evaluation</a>
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
                    <div class="col-md-12">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-primary">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.student }}</h3>
                                                <h6 class="stats-title">Number of Students</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-success">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.adviser }}</h3>
                                                <h6 class="stats-title">Number of Adviser</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-info">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.st }}</h3>
                                                <h6 class="stats-title">Number of Subject Teacher</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-danger">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.panel }}</h3>
                                                <h6 class="stats-title">Number of Panel</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-danger">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.group }}</h3>
                                                <h6 class="stats-title">Number of Groups</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-danger">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.archived }}</h3>
                                                <h6 class="stats-title">Number of Research Archived</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="statistics">
                                            <div class="info">
                                                <div class="icon icon-danger">
                                                    <i class="now-ui-icons objects_support-17"></i>
                                                </div>
                                                <h3 class="info-title">{{ getadminDashboard.sched }}</h3>
                                                <h6 class="stats-title">Schedule for Today</h6>
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
import StudentSidebar from './StudentSidebar'
import { mapGetters, mapActions } from 'vuex'
export default {
    props:['user'],
    components:{
        'sidebar' : StudentSidebar,
    },
    methods:{
        ...mapActions(["fetchadminDashboard","fetchDependencies"])
    },
    computed: mapGetters(['getadminDashboard']),
    created(){
        this.fetchadminDashboard();
        this.fetchDependencies();
    }
}
</script>
