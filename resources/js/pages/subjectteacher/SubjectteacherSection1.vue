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

                        <a class="navbar-brand" href="#">Section for Capstone 1</a>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class=" card-title">List of Capstone 1 Section</h4>
                    </div>
                    <div class="card-body">

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
                        section : res.data.section
                    }
                })
            }
        },
        created() {
            this.GetSTDashbaord()
        }
    }

</script>
