<template>
    <div class="sidebar" id="sidebar" data-color="red">
        <div class="logo">
            <a href="#" class="logo-mini">
                <img src="/assets/img/logo.png" />
            </a>

            <a href="#" class="simple-text logo-normal">
                CCERMS
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="/nowasset/assets/img/james.jpg" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                            {{ user.name }}
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li v-if="user.typ_id == 1">
                                <router-link to="/admin/profile">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Profile</span>
                                </router-link>
                            </li>
                            <li v-if="user.typ_id == 2">
                                <router-link to="/adviser/profile">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Profile</span>
                                </router-link>
                            </li>
                            <li v-if="user.typ_id == 4">
                                <router-link to="/subjectteacher/profile">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Profile</span>
                                </router-link>
                            </li>
                            <li v-if="user.typ_id == 6">
                                <router-link to="/adviser/profile">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Profile</span>
                                </router-link>
                            </li>
                             <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Notifications</span>
                                </a>
                            </li>
                             <li>
                                <router-link to="/adviser/messenger">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Messages</span>
                                </router-link>
                            </li>
                            <li>
                                <a @click="logout" href="#">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li>
                    <router-link to="/adviser/dashboard">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </router-link>

                </li>
                <li>
                    <router-link to="/adviser/schedule">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Manage Schedule</p>
                    </router-link>

                </li>
                <li>
                    <a data-toggle="collapse" href="#managegroups">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Manage Groups <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="managegroups">
                        <ul class="nav">
                             <li v-if="user.typ_id != 1">
                                <router-link to="/adviser/grouprequest">
                                    <span class="sidebar-mini-icon">GR</span>
                                    <span class="sidebar-normal">Group Request</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/adviser/capstone1">
                                    <span class="sidebar-mini-icon">C1</span>
                                    <span class="sidebar-normal">Capstone 1</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/adviser/capstone2">
                                    <span class="sidebar-mini-icon">C2</span>
                                    <span class="sidebar-normal">Capstone 2</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>


                </li>
                 <li v-if="user.typ_id != 2">
                    <a data-toggle="collapse" href="#loginas">
                        <i class="fas fa-cogs"></i>
                        <p>
                            Login As <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="loginas">
                        <ul class="nav">
                            <li v-if="user.typ_id == 1">
                               <router-link to="/admin/dashboard">
                                    <span class="sidebar-mini-icon">RC</span>
                                    <span class="sidebar-normal">Research Coordinator</span>
                                </router-link>
                            </li>
                            <li v-if="user.typ_id == 1 || user.typ_id == 4">
                               <router-link to="/subjectteacher/dashboard">
                                    <span class="sidebar-mini-icon">ST</span>
                                    <span class="sidebar-normal">Subject Teacher</span>
                                </router-link>
                            </li>
                            <li>
                               <router-link to="/panel/dashboard">
                                    <span class="sidebar-mini-icon">P</span>
                                    <span class="sidebar-normal">Panel</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props:['user'],
        methods:{
            logout(){
                axios.post('../logout').then(() => {
                    location.reload()
                })
            }
        }
    }

</script>
