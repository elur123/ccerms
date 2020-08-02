<template >
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

                        <a class="navbar-brand" href="#">Student Group Section</a>
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
            ...mapActions(["fetchadminDashboard","fetchDependencies","getGroupInfo"])
        },
        computed: {
            ...mapGetters(['getadminDashboard','groupinfo']),
        },
        created() {
            this.CheckSection()
            this.getGroupInfo(this.user.grp_id)
        }
    }

</script>
<style scoped>
</style>
