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

                        <a class="navbar-brand" href="#">Student Dashboard</a>
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
                                <div class="container" v-if="this.groupinfo.info && groupinfo.info.grp_standing == 0">
                                    <h4 class="title text-center">Waiting the Group to Ouline Defense.</h4>
                                    <div class="alert alert-warning text-center">
                                        <span>
                                            If you already take the Outline Defense. And you cannot submit files. <br>
                                            Contact RC to make your Schedule and Minutes. <br>
                                            Your the Group Messenger or just PM the RC.
                                        </span>
                                    </div>
                                </div>
                                <form-wizard v-if="this.groupinfo.info && groupinfo.info.grp_standing == 1" color="#f44336" :start-index="this.groupinfo.info.caps1" ref="wizzard">
                                    <h2 slot="title">Milestone for Capstone 1</h2>
                                    <p slot="title" v-if="groupinfo.info.grp_percent < 50">Complete each Milestone to gain progress in your groups</p>
                                    <p slot="title" v-if="groupinfo.info.grp_percent == 50" class="text-primary">Your Group is waiting for RC to Update your Group standing to Capstone/Thesis 2</p>
                                    <tab-content title="Chapter 1 to 3" icon="fas fa-file">
                                        <c1-chapters :user="user" />
                                    </tab-content>
                                     <tab-content title="Capstone 1 System" icon="fas fa-cogs">
                                         <c1-system />
                                    </tab-content>
                                     <tab-content title="Evaluation" icon="fas fa-file">
                                         <c1-evaluation :getcaps1evalution="getcaps1evalution" :user="user" :grp="groupinfo.info" />
                                    </tab-content>
                                     <tab-content title="Grammarly and Plagiarism" icon="fas fa-file">
                                         <c1-grammarly  />
                                    </tab-content>
                                     <tab-content title="Validator" icon="fas fa-file">
                                         <c1-validation :getcaps1validation="getcaps1validation"/>
                                    </tab-content>
                                    <template slot="footer">
                                        <div class="wizard-footer-right">

                                        </div>
                                    </template>
                                </form-wizard>
                                <form-wizard v-if="this.groupinfo.info && groupinfo.info.grp_standing == 2" color="#f44336" :start-index="this.groupinfo.info.caps2" ref="wizzard">
                                    <h2 slot="title">Milestone for Thesis/Capstone 2</h2>
                                    <p slot="title" v-if="groupinfo.info.caps2 < 4">Complete each Milestone to gain progress in your groups</p>
                                    <p slot="title" v-if="groupinfo.info.caps2 == 4" class="text-primary">Your Group is waiting for the panels to Validate or the RC to Update your Group standing to Capstone/Thesis 2</p>
                                    <tab-content title="Certificates" icon="fas fa-file">
                                        <c2-system :user="user" :grp="groupinfo.info" />
                                    </tab-content>
                                    <tab-content title="Chapter 1 to 6" icon="fas fa-file">
                                        <c2-chapters :user="user" />
                                    </tab-content>
                                    <tab-content title="Evaluation" icon="fas fa-file">
                                        <c2-evaluation :getcaps1evalution="getcaps1evalution" :user="user" :grp="groupinfo.info" />
                                    </tab-content>
                                    <tab-content title="Grammarly and Plagiarism" icon="fas fa-file">
                                        <c2-grammarly  />
                                    </tab-content>
                                    <tab-content title="Validation" icon="fas fa-file">
                                        <c2-validation :getcaps1validation="getcaps1validation"/>
                                    </tab-content>
                                    <template slot="footer">
                                        <div class="wizard-footer-right">

                                        </div>
                                    </template>
                                </form-wizard>
                                <div class="container"  v-if="this.groupinfo.info && groupinfo.info.grp_standing == 3">
                                    <final-submission v-if="groupinfo.info.isDone == 0" :grp="groupinfo.info" />
                                    <congratualation v-if="groupinfo.info.isDone == 1" />
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
import Chapters1 from './Milestone/Capstone1/Chapters'
import System1 from './Milestone/Capstone1/SystemChecking'
import Evaluation from './Milestone/Capstone1/Evaluation'
import Grammarly from './Milestone/Capstone1/Grammarly'
import Validation from './Milestone/Capstone1/Validation'

import System2 from './Milestone/Capstone2/System'
import Chapters2 from './Milestone/Capstone2/Chapters'
import Evaluation2 from './Milestone/Capstone2/Evaluation'
import Grammarly2 from './Milestone/Capstone2/Grammarly'
import Validation2 from './Milestone/Capstone2/Validation'

import FinalSubmission from './Milestone/FinalSubmission'
import Congratualation from './Milestone/Congratualation'
import { mapGetters, mapActions } from 'vuex'
export default {
    props:['user'],
    components:{
        'sidebar' : StudentSidebar,
        'c1-chapters' : Chapters1,
        'c1-system' : System1,
        'c1-grammarly' : Grammarly,
        'c1-evaluation' : Evaluation,
        'c1-validation' : Validation,

        'c2-system' : System2,
        'c2-chapters' :Chapters2,
        'c2-evaluation' :Evaluation2,
        'c2-grammarly' : Grammarly2,
        'c2-validation' : Validation2,

        'final-submission' :FinalSubmission,
        'congratualation' : Congratualation
    },
    data(){
        return{
            req :{
                grp : this.user.grp_id,
                id : ''
            }
        }
    },
    methods:{
        ...mapActions(["fetchadminDashboard","fetchDependencies","getGroupInfo", "getCapstone1SubmittedDocs","getCapstone1checkSys","getCapstone1Evaluation","getCapston1Grammarly","getCapstone1Validation","getFinalChecklist"])
    },
    computed: mapGetters(['getadminDashboard','groupinfo','getcaps1evalution', 'getcaps1validation']),
    created(){
        // this.fetchadminDashboard();
        // this.fetchDependencies();
        this.getFinalChecklist(this.user.grp_id)
        this.getGroupInfo(this.user.grp_id)
        this.getCapstone1SubmittedDocs(this.user.grp_id)
        this.getCapstone1checkSys(this.user.grp_id)
        this.getCapstone1Evaluation(this.req)
        this.getCapstone1Validation(this.req)
        this.getCapston1Grammarly(this.user.grp_id)
    }
}
</script>
