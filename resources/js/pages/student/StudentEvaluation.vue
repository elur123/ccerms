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

                        <a class="navbar-brand" href="#">Student Evaluation</a>
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
        <val1 :sections="sections" :grp="groupinfo.info" v-if="groupinfo.info.sec_id == null && groupinfo.info.grp_standing == 0" />
        <val2 :sections="sections" :grp="groupinfo.info" v-if="groupinfo.info.sec_id2 == null && groupinfo.info.grp_standing == 2" />
    </div>
</template>
<script>
import ValidateSection1 from './ValidateSection1'
import ValidateSection2 from './ValidateSection2'
import StudentSidebar from './StudentSidebar'
import { mapGetters, mapActions } from 'vuex'
export default {
    props:['user'],
    data(){
        return{
            sections: {}
        }
    },
    components:{
        'val1' : ValidateSection1,
        'val2' : ValidateSection2,
        'sidebar' : StudentSidebar,
    },
    methods:{
        CheckSection(){
            axios.get('../../api/getsectionlist/'+ this.user.grp_id).then(res => {
                this.sections = res.data.sections
            })
        },
        ...mapActions(["fetchadminDashboard","fetchDependencies", "getGroupInfo"])
    },
    computed: mapGetters(['getadminDashboard', 'groupinfo']),
    created(){
        this.CheckSection()
        this.fetchadminDashboard();
        this.fetchDependencies();
        this.getGroupInfo(this.user.grp_id)
    }
}
</script>
