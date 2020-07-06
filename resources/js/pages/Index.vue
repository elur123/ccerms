<template>
    <div>
        <nav-bar> </nav-bar>
        <div class="page-header header-filter" data-parallax="true"
            style="background-image: url('/assets/img/bg8.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">CCERMS</h1>
                        <h4>A Multi-platform Research Management System for College of Computing Education</h4>
                        <br>
                        <a href="/login" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised" id="app">
            <div class="container">
                <div class="section text-center" id="howto">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h2 class="title">HOW CCERMS WORK'S</h2>
                            <h5 class="description">Registration is the first process for admit this instute regard none
                                alumni elit process going over the horizin.</h5>
                        </div>
                    </div>
                    <div class="features">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">SEARCH RESEARCH ARCHIVED</h4>
                                    <p>You can Search Research Archived and view Abstract of the research.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">MAKE REGISTRATION</h4>
                                    <p>Register if you enrolled the Capstone or Thesis Subject.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">description</i>
                                    </div>
                                    <h4 class="info-title">SUBMIT DOCUMENTATION</h4>
                                    <p>Submit your Documents anytime into a specific personnel.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">assessment</i>
                                    </div>
                                    <h4 class="info-title">MONITOR PORGRESS</h4>
                                    <p>DAfter the title proposal appproved, you can monitorized your progress.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <research-list></research-list>
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com/">
                                CCERMS
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    2020, Developed By Ruel Israel, Ian Jay Subang, Joey Cariaga
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
import Navbar from '../components/Navbar'
    export default {
        components: {
            'nav-bar' : Navbar
        }
    }

</script>
