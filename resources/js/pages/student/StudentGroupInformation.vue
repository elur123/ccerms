<template>
    <div v-if="groupinfo.info">
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

                        <a class="navbar-brand" href="#">Student Group Information</a>
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
            <div class="panel-header">
                <div class="header text-center" v-if="groupinfo.info">
                    <h2 class="title">{{ groupinfo.info.grp_title }}</h2>
                    <p class="category">{{ groupinfo.info.grp_researchtitle }}</p>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title title text-center">Group Progress</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="title text-center">RC Progress</h4>
                                            </div>
                                            <div class="card-body">
                                                <rc-progress v-if="this.groupinfo.info" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="title text-center">Adviser Progress</h4>
                                            </div>
                                            <div class="card-body">
                                                <adviser-progress v-if="this.groupinfo.info" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="title text-center">Panel Progress</h4>
                                            </div>
                                            <div class="card-body">
                                                <panel-progress v-if="this.groupinfo.info" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-header">
                               <h4 class="card-title title text-center">Group Details</h4>
                           </div>
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-md-4 text-center">
                                       <h5>Members</h5>
                                       <hr>
                                       <h6 v-for="mem in groupinfo.members" :key="mem.id">{{mem.name}}</h6>
                                   </div>
                                   <div class="col-md-4 text-center" v-if="groupinfo.adviser">
                                       <h5>Adviser</h5>
                                       <hr>
                                       <h6 v-if="groupinfo.adviser.id != 2">{{groupinfo.adviser.name}}</h6>
                                       <h6 v-if="groupinfo.adviser.id == 2">No Adviser Yet</h6>
                                   </div>
                                   <div class="col-md-4 text-center">
                                       <h5>Panels</h5>
                                       <hr>
                                       <h6 v-for="pan in groupinfo.panels" :key="pan.id">{{pan.name}}</h6>
                                   </div>
                               </div>
                               <hr>
                               <div class="row text-center" v-if="groupinfo.info">
                                   <div class="col-md-4">
                                       <h5>Code</h5>
                                       <hr>
                                       <h6>{{ groupinfo.info.grp_code }}</h6>
                                   </div>
                                   <div class="col-md-4">
                                       <h5>Defense Status</h5>
                                       <hr>
                                       <h6>{{  groupinfo.info.styp_title }}</h6>
                                   </div>
                                   <div class="col-md-4">
                                       <h5>Group Standing</h5>
                                       <hr>
                                       <h6 v-if="groupinfo.info.grp_standing == 1">Capstone 1</h6>
                                       <h6 v-if="groupinfo.info.grp_standing == 2">Capstone 2</h6>
                                       <h6 v-if="groupinfo.info.grp_standing == 3">Done</h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <val1 :sections="sections" :grp="groupinfo.info" v-if="groupinfo.info.sec_id == null && groupinfo.info.grp_standing == 0" />
        <val2 :sections="sections" :grp="groupinfo.info" v-if="groupinfo.info.sec_id2 == null && groupinfo.info.grp_standing == 2" />
    </div>
</template>
<script>
    import ValidateSection1 from './ValidateSection1'
    import ValidateSection2 from './ValidateSection2'
    import StudentSidebar from './StudentSidebar'
    import RCProgress from '../../components/Progress/RCProgress'
    import AdviserProgress from '../../components/Progress/AdviserProgress'
    import PanelProgress from '../../components/Progress/PanelProgress'
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'val1' : ValidateSection1,
            'val2' : ValidateSection2,
            'sidebar': StudentSidebar,
            'rc-progress' : RCProgress,
            'adviser-progress' : AdviserProgress,
            'panel-progress' : PanelProgress,
        },
        data() {
            return {
                GroupInfo: {},
                members: {},
                adviser: {},
                panels: {},

                isUpload: false,

                sections:{},
            }
        },
        methods: {
            CheckSection(){
                axios.get('../../api/getsectionlist/'+ this.user.grp_id).then(res => {
                    this.sections = res.data.sections
                })
            },
            GetGroupInfo() {
                axios.get('../../api/selectCap1/' + this.user.grp_id).then(res => {
                    this.GroupInfo = res.data.info[0]
                    this.members = res.data.members
                    this.adviser = res.data.adviser[0]
                    this.panels = res.data.panels
                })
            },
            SelectLogo(){
                this.isUpload = true
            },
            ...mapActions(["fetchadminDashboard","fetchDependencies","getGroupInfo"])
        },
        computed: {
            ...mapGetters(['getadminDashboard','groupinfo']),
        },
        created() {
            this.CheckSection()
            // this.fetchadminDashboard();
            // this.fetchDependencies();
            this.getGroupInfo(this.user.grp_id);
        }
    }

</script>
<style scoped>
</style>
