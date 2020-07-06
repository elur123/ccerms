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

                        <a class="navbar-brand" href="#">Student Group Submission</a>
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
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="card-title">Adviser Submission History</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Rev. #</strong></td>
                                                <td><strong>Chapter</strong></td>
                                                <td><strong>Date Submitted</strong></td>
                                                <td><strong>Submitted by</strong></td>
                                                <td><strong>Submitted to</strong></td>
                                                <td><strong>Status</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(docs) in getcaps1submitteddocs.documents1" :key="docs.dcs_id">
                                                <td>{{ docs.dcs_revID }}</td>
                                                <td>{{ docs.dcs_document }}</td>
                                                <td>{{ docs.dcs_date }}</td>
                                                <td>{{ docs.submitby }}</td>
                                                <td>{{ docs.submitto }}</td>
                                                <td>{{ docs.ss_title }}</td>
                                            </tr>
                                            <tr v-for="(docs) in getcaps1submitteddocs.documents2" :key="docs.dcs_id">
                                                <td>{{ docs.dcs_revID }}</td>
                                                <td>{{ docs.dcs_document }}</td>
                                                <td>{{ docs.dcs_date }}</td>
                                                <td>{{ docs.submitby }}</td>
                                                <td>{{ docs.submitto }}</td>
                                                <td>{{ docs.ss_title }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="card-title">Panel Submission History</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Rev. #</strong></td>
                                                <td><strong>Chapter</strong></td>
                                                <td><strong>Panel Name</strong></td>
                                                <td><strong>Date Submitted</strong></td>
                                                <td><strong>File</strong></td>
                                                <td><strong>Status</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(revise) in getcaps1revisefile.revise1" :key="revise.rev_id">
                                                <td>{{ revise.rev_revID }}</td>
                                                <td>{{ revise.rev_document }}</td>
                                                <td>{{ revise.name }}</td>
                                                <td>{{ revise.rev_date }}</td>
                                                <td>{{ revise.rev_panfile }}</td>
                                                <td>{{ revise.ss_title }}</td>
                                            </tr>
                                            <tr v-for="(revise) in getcaps1revisefile.revise2" :key="revise.rev_id">
                                                <td>{{ revise.rev_revID }}</td>
                                                <td>{{ revise.rev_document }}</td>
                                                <td>{{ revise.name }}</td>
                                                <td>{{ revise.rev_date }}</td>
                                                <td>{{ revise.rev_panfile }}</td>
                                                <td>{{ revise.ss_title }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': StudentSidebar,
        },
        methods: {
            GetRevisefile() {
                var req = {
                    grp: this.user.grp_id,
                    id: ''
                }
                this.getCapstone1ReviseFile(req)
            },
            ...mapActions(["getCapstone1SubmittedDocs", "getGroupInfo", "getCapstone1ReviseFile"])
        },
        computed: mapGetters(['getcaps1submitteddocs', 'groupinfo', 'getcaps1revisefile']),
        created() {
            this.getCapstone1SubmittedDocs(this.user.grp_id)
            this.GetRevisefile()
        }
    }

</script>
