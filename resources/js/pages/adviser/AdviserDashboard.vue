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
            <div class="panel-header panel-header-sm" style="background:#bd821c;">
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
                                                <h3 class="info-title">{{ count.active }}</h3>
                                                <h6 class="stats-title">Active of Groups</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                                                <h3 class="info-title">{{ count.done }}</h3>
                                                <h6 class="stats-title">Done Groups</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                                    <caps1 v-if="groups.c1 != ''" :getadminDashboard="groups.c1"></caps1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Capstone 2 Progress</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <caps2 v-if="groups.c2 != ''" :getadminDashboard="groups.c2"></caps2>
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
    import AdviserSidebar from './AdviserSidebar'
    import Capstone1 from '../admin/Graph/Capstone1'
    import Capstone2 from '../admin/Graph/Capstone2'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdviserSidebar,
            'caps1': Capstone1,
            'caps2' : Capstone2
        },
        data(){
            return{
                groups:{
                    c1:'',
                    c2:'',
                },
                count:{
                    active:0,
                    done:0
                }
            }
        },
        methods: {
            GetAdviserGroups(){
                axios.get('../api/getadvisercapstone1/' + this.user.id).then(res => {
                    this.groups.c1 = res.data.c1
                    this.groups.c2 = res.data.c2
                    this.count.active = res.data.active
                    this.count.done = res.data.done
                })
            }
        },
        created() {
            this.GetAdviserGroups()
        }
    }
</script>
