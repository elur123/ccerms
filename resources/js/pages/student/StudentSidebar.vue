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
                            <li>
                                <router-link to="/student/profile">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </router-link>
                            </li>
                             <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Notifications</span>
                                </a>
                            </li>
                             <li>
                                <router-link to="/student/messenger">
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
                    <router-link to="/student/dashboard">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                 <li>
                    <a data-toggle="collapse" href="#manageusers">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Groups<b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="manageusers">
                        <ul class="nav">
                            <li>
                                <router-link to="/student/group/information">
                                    <span class="sidebar-mini-icon">I</span>
                                    <span class="sidebar-normal">Information</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/student/group/section">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal">Section</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/student/group/submission">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal">Submission</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/student/group/minutes">
                                    <span class="sidebar-mini-icon">M</span>
                                    <span class="sidebar-normal">Minutes</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                 </li>
                <li>
                    <router-link to="/student/schedule">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Schedule</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/student/researchlist">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Research List</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/student/evaluation">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Evaluation</p>
                    </router-link>
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
                axios.post('../../logout').then(() => {
                    location.reload()
                })
            }
        }
    }

</script>
