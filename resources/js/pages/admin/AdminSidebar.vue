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
                                <router-link to="/admin/profile">
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
                                 <router-link to="/admin/messenger">
                                    <span class="sidebar-mini-icon">||</span>
                                    <span class="sidebar-normal">Messenger</span>
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
                    <router-link to="/admin/dashboard">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </router-link>

                </li>
                <li>
                    <router-link to="/admin/schedule">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Manage Schedule</p>
                    </router-link>

                </li>
                 <li>
                    <a data-toggle="collapse" href="#manageusers">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Manage Users <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="manageusers">
                        <ul class="nav">
                            <li>
                                <router-link to="/admin/student">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal">Students</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/subjectteacher">
                                    <span class="sidebar-mini-icon">ST</span>
                                    <span class="sidebar-normal">Subject Teacher</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/researchpersonnel">
                                    <span class="sidebar-mini-icon">RP</span>
                                    <span class="sidebar-normal">Research Personnel</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>


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
                            <li>
                                <router-link to="/admin/capstone1">
                                    <span class="sidebar-mini-icon">C1</span>
                                    <span class="sidebar-normal">Capstone 1</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/capstone2">
                                    <span class="sidebar-mini-icon">C2</span>
                                    <span class="sidebar-normal">Capstone 2</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/groupdone">
                                    <span class="sidebar-mini-icon">D</span>
                                    <span class="sidebar-normal">Done</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#manageminutes">
                        <i class="fas fa-file-signature"></i>
                        <p>
                            Manage Minutes <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="manageminutes">
                        <ul class="nav">
                            <li>
                                <router-link to="/admin/viewminutes">
                                    <span class="sidebar-mini-icon">VM</span>
                                    <span class="sidebar-normal"> View Minutes </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/titleoutlineminutes">
                                    <span class="sidebar-mini-icon">TO</span>
                                    <span class="sidebar-normal">Title-Outline</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/finalminutes">
                                    <span class="sidebar-mini-icon">F</span>
                                    <span class="sidebar-normal">Final</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#managedocuments">
                        <i class="fas fa-file-alt"></i>
                        <p>
                            Archive Research <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="managedocuments">
                        <ul class="nav">
                            <li>
                                <router-link to="/admin/viewdocuments">
                                    <span class="sidebar-mini-icon">R</span>
                                    <span class="sidebar-normal">Research</span>
                                </router-link>
                            </li>
                            <!-- <li>
                                <router-link to="/admin/adddocument">
                                    <span class="sidebar-mini-icon">AD</span>
                                    <span class="sidebar-normal">Add Documents</span>
                                </router-link>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#generatereports">
                        <i class="fas fa-file-contract"></i>
                        <p>
                            Generate Reports <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="generatereports">
                        <ul class="nav">
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">APG</span>
                                    <span class="sidebar-normal">Adviser Per Groups</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">RP</span>
                                    <span class="sidebar-normal">Research Personnel</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">GP</span>
                                    <span class="sidebar-normal">Group Progress</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">LOR</span>
                                    <span class="sidebar-normal">List of Research</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">SP</span>
                                    <span class="sidebar-normal">Schedule Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/pricing.html">
                                    <span class="sidebar-mini-icon">EP</span>
                                    <span class="sidebar-normal">Evaluation Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>


                </li>
                 <li>
                    <a data-toggle="collapse" href="#loginas">
                        <i class="fas fa-cogs"></i>
                        <p>
                            Login As <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="loginas">
                        <ul class="nav">
                            <li>
                                <router-link to="/subjectteacher/dashboard">
                                    <span class="sidebar-mini-icon">ST</span>
                                    <span class="sidebar-normal">Subject Teacher</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/adviser/dashboard">
                                    <span class="sidebar-mini-icon">A</span>
                                    <span class="sidebar-normal">Adviser</span>
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
