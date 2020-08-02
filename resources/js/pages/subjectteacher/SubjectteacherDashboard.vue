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

                        <!-- <a class="navbar-brand" href="#">Dashboard</a> -->
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>


                </div>
            </nav>
            <div class="panel-header panel-header-sm" style="background:#820c68;">
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
                                                <h3 class="info-title">{{ count.student  }}
                                                </h3>
                                                <h6 class="stats-title">Number of Student</h6>
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
                                                <h3 class="info-title">{{ count.section  }}
                                                </h3>
                                                <h6 class="stats-title">Number of Sections</h6>
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
                                                <h3 class="info-title">{{ count.group }}</h3>
                                                <h6 class="stats-title">Number of Groups</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import SubjectteacherSidebar from './SubjectteacherSidebar'
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': SubjectteacherSidebar,
        },
        data() {
            return {
                count: {
                    student: 0,
                    group: 0,
                    section: 0,
                }
            }
        },
        methods: {
            GetSTDashbaord(){
                axios.get('../api/getstdashboard/'+this.user.id).then(res => {
                    this.count = {
                        student : res.data.student,
                        section : res.data.section,
                        group : res.data.groups
                    }
                })
            }
        },
        created() {
            this.GetSTDashbaord()
        }
    }

</script>
