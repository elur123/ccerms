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

                        <a v-if="isSelect == false" class="navbar-brand" href="#">Capstone2</a>
                        <a @click="Cancel" v-if="isSelect == true" class="navbar-brand" href="#">Back</a>
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
            <div class="panel-header" :class="{ 'panel-header-sm': isSelect == false }" style="background:#bd821c;">
                <div v-if="isSelect == true" class="header text-center">
                    <h2 class="title">{{ grp.grp_title }}</h2>
                    <p class="category">{{ grp.grp_researchtitle }}</p>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div v-if="isSelect == false" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Group List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Name</strong></td>
                                                <td><strong>Research Title</strong></td>
                                                <td><strong>Course</strong></td>
                                                <td><strong>Action</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(groups, index) in c1" :key="groups.ag_id">
                                                <td>{{ groups.grp_title }}</td>
                                                <td>{{ groups.grp_researchtitle }}</td>
                                                <td>{{ groups.crs_title }}</td>
                                                <td>
                                                    <button @click="Manage(index)"
                                                        class="btn btn-info btn-round btn-sm"><i
                                                            class="fas fa-cogs"></i>Manage</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="isSelect == true" class="col-md-12">
                        <div class="card card-subcategories">
                            <div class="card-body">
                                <div class="alert alert-warning text-center" v-if="grp.caps2 == 4 && grp.grp_standing == 2">
                                    <span>
                                        Group are waiting Panel to Validate. <br>
                                        Or Waiting for RC to Approve the Group Standing to Thesis/Capstone 2.
                                    </span>
                                </div>
                                <ul class="nav nav-pills nav-pills-info nav-pills-icons justify-content-center"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a href="#info" data-toggle="tab" role="tablist" class="nav-link active">
                                            <i class="fas fa-info"></i>
                                            Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#adviser" data-toggle="tab" role="tablist" class="nav-link">
                                            <i class="fas fa-file"></i>
                                            Submission
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#panel" data-toggle="tab" role="tablist" class="nav-link">
                                            <i class="fas fa-user"></i>
                                            Panel
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#resources" data-toggle="tab" role="tablist" class="nav-link">
                                            <i class="fas fa-file"></i>
                                            Resources
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#message" data-toggle="tab" role="tablist" class="nav-link">
                                            <i class="fas fa-comment-dots"></i>
                                            Message
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-space tab-subcategories">
                                    <div class="tab-pane active" id="info">
                                        <information :grp="grp" />
                                    </div>
                                    <div class="tab-pane" id="adviser">
                                        <submission :user="user" :grp="grp" />
                                    </div>
                                    <div class="tab-pane" id="panel">
                                        <evaluation :getcaps1evalution="getcaps1evalution"/>
                                        <validation :getcaps1validation="getcaps1validation"/>
                                    </div>
                                    <div class="tab-pane" id="resources">
                                        <resources :getcaps1evalution="getcaps1evalution" :getcaps1validation="getcaps1validation" :capstone="grp" :user="grp" />
                                    </div>
                                    <div class="tab-pane" id="message">

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
    import AdviserSidebar from './AdviserSidebar'
    import Submission from './Capstone2/Submission'
    import Information from './Capstone1/Information'
    import Evaluation from '../admin/Capstone2/Evaluation'
    import Validation from '../admin/Capstone2/Validator'
    import Resources from '../admin/Capstone2/Resources'
    // import VueDocPreview from 'vue-doc-preview'
    import pdf from 'vue-pdf'
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdviserSidebar,
            'information' : Information,
            'submission': Submission,
            'evaluation' : Evaluation,
            'validation' : Validation,
            'resources' : Resources,
            // VueDocPreview,
            pdf
        },
        data() {
            return {
                reason: null,
                error: {},

                members: {},
                panels: {},
                c1: {},
                grp: {},

                isSelect: false,

            }
        },
        methods: {
            GetAdviserCapstone1() {
                axios.get('../api/getadvisercapstone1/' + this.user.id).then(res => {
                    this.c1 = res.data.c2
                })
            },
            Manage(index) {
                this.isSelect = true
                this.grp = this.c1[index]
                // this.GetCapstoneDetails()
                //get Capstone 1 checking system
                var req = {
                    grp: this.grp.grp_id,
                    id: ''
                }
                this.getGroupInfo(this.grp.grp_id)
                this.getCapstone1checkSys(this.grp.grp_id)
                this.getCapstone1Evaluation(req)
                this.getCapstone1Validation(req)
                this.getCapston1Grammarly(this.grp.grp_id)

            },
            Cancel(index) {
                this.isSelect = false
                this.docs = {}
                this.path = ''
                this.isCheck = false
                this.grp = {}
            },

            GrammarlyUpload() {

            },
            ...mapActions(["getGroupInfo","fetchadminDashboard", "fetchDependencies", "getCapstone1checkDocs", "getCapstone1checkSys","getCapstone1Evaluation","getCapston1Grammarly","getCapstone1Validation"])
        },
        computed: mapGetters(['getadminDashboard', 'getcaps1checkdocs', 'getcaps1checksys','getcaps1evalution','getcaps1validation']),
        created() {
            this.GetAdviserCapstone1();
        }
    }

</script>
<style scoped>
    .doc {
        width: 100%;
        height: 500px;
    }

</style>
