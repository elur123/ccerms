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

                        <a v-if="isSelect == false" class="navbar-brand" href="#">Capstone 1</a>
                        <a v-else @click="Unselect" class="navbar-brand" href="#">Back</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                </div>
            </nav>
            <div class="panel-header" :class="{ 'panel-header-sm': isSelect == false }">
                <div v-if="isSelect == true && groupinfo.info" class="header text-center">
                    <h2 class="title">{{ groupinfo.info.grp_title }}</h2>
                    <p class="category">{{ capstone.grp_researchtitle }}</p>
                </div>
            </div>
            <div class="content">
                <div v-if="isSelect == false" class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Capstone 1 List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hovered">
                                        <thead class="text-info">
                                            <tr>
                                                <td><strong>Group Name</strong></td>
                                                <td><strong>Group Title</strong></td>
                                                <td><strong>Group Course</strong></td>
                                                <td><strong>Group Code</strong></td>
                                                <td><strong>Defense Standing</strong></td>
                                                <td><strong>Group Percent</strong></td>
                                                <td><strong>Action</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(cap1, index) in getadminDashboard.c1" :key="cap1.grp_id">
                                                <td>{{ cap1.grp_title }}</td>
                                                <td>{{ cap1.grp_researchtitle }}</td>
                                                <td>{{ cap1.crs_title }}</td>
                                                <td>{{ cap1.grp_code }}</td>
                                                <td>{{ cap1.styp_title }}</td>
                                                <td>{{ cap1.grp_percent }}%</td>
                                                <td><button @click="Select(index)"
                                                        class="btn btn-info btn-sm btn-round">Manage</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="isSelect == true" class="row">
                    <div class="col-md-12">
                        <div class="card card-subcategories">
                            <div class="card-body">
                                <div class="alert alert-warning text-center" v-if="capstone.grp_percent == 50">
                                    <span>
                                        Waiting for your approval. <br>
                                        This Group Accomplish the Thesis/Capstone 1.<br>
                                        Check the Turnitin Categories, and Check if all panels already validate the
                                        group. <br>
                                        Click the <strong>Approve</strong> button to proceed the groups to
                                        Thesis/Capstone 2 milestone. <br>
                                        <button @click="ShowConfirmation"
                                            class="btn btn-info btn-round">Approve</button>
                                    </span>
                                </div>
                                <div class="card-header">
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
                                                <i class="fas fa-user"></i>
                                                Adviser
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#panel" data-toggle="tab" role="tablist" class="nav-link">
                                                <i class="fas fa-user"></i>
                                                Panel
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#submission" data-toggle="tab" role="tablist" class="nav-link">
                                                <i class="fas fa-file"></i>
                                                Turnitin
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#minutes" data-toggle="tab" role="tablist" class="nav-link">
                                                <i class="fas fa-calendar"></i>
                                                Minutes
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="#message" data-toggle="tab" role="tablist" class="nav-link">
                                                <i class="fas fa-comment-dots"></i>
                                                Message
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="tab-content tab-space tab-subcategories">
                                    <div class="tab-pane active" id="info">
                                        <form-wizard v-if="groupinfo.info && (groupinfo.info.grp_standing == 1 || groupinfo.info.grp_standing == 0)" color="#f44336" :start-index="groupinfo.info.caps1" ref="wizzard">
                                            <h4 slot="title" class="title">Group Milestone</h4>
                                            <tab-content title="Chapter 1 to 3" icon="fas fa-file"></tab-content>
                                            <tab-content title="Capstone 1 System" icon="fas fa-cogs"></tab-content>
                                            <tab-content title="Evaluation" icon="fas fa-file"></tab-content>
                                            <tab-content title="Grammarly and Plagiarism" icon="fas fa-file"></tab-content>
                                            <tab-content title="Validator" icon="fas fa-file"></tab-content>
                                            <template slot="footer">
                                                <div class="wizard-footer-right">

                                                </div>
                                            </template>
                                        </form-wizard>
                                        <h4 class="title text-center">Group Information</h4>
                                        <hr>
                                        <div v-if="isAssignAdviser == false && isAssignPanel == false" class="row">
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Members:
                                                </p>
                                                <h6 class="text-center" v-for="mem in groupinfo.members" :key="mem.id">
                                                    {{ mem.name }}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Adviser:
                                                </p>
                                                <h6 class="text-center" v-if="groupinfo.adviser">
                                                    <p v-if="groupinfo.adviser.id != 2">{{ groupinfo.adviser.name }}</p>
                                                    <p v-if="groupinfo.adviser.id == 2 && groupinfo.adviser.us_id != 1">
                                                        No Adviser Yet</p>
                                                    <p style="font-size:10px;"
                                                        v-if="groupinfo.adviser.id != 2 && groupinfo.adviser.us_id != 1">
                                                        {{ groupinfo.adviser.us_title }}</p>
                                                    <p style="color:red;">{{ groupinfo.adviser.adv_reason }}</p>
                                                    <button @click="AssignAdviser"
                                                        class="btn btn-info btn-round btn-block">Assign</button>
                                                </h6>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Panels:
                                                </p>
                                                <h6 class="text-center" v-for="pans in groupinfo.panels" :key="pans.id">
                                                    <p>{{ pans.name }} -- {{ pans.us_title }}</p>
                                                </h6>
                                                <button @click="AssignPanels"
                                                    class="btn btn-info btn-round btn-block">Assign</button>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Status:
                                                </p>
                                                <h6 class="text-center">{{ capstone.styp_title }}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Code:</p>
                                                <h6 class="text-center">{{ capstone.grp_code }}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="font-size:15px;" class="category text-center">Group Course:
                                                </p>
                                                <h6 class="text-center">{{ capstone.crs_title }}</h6>
                                            </div>
                                        </div>
                                        <div v-if="isAssignAdviser == true" class="row">
                                            <div class="col-md-8 mr-auto ml-auto">
                                                <h6 class="text-center">Assign Adviser</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-hovered">
                                                        <thead class="text-info">
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td><strong>Specialty</strong></td>
                                                                <td><strong>User Type</strong></td>
                                                                <td><strong>Action</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="list in getadviserList" :key="list.id">
                                                                <td>{{ list.name }}</td>
                                                                <td>{{ list.specialty }}</td>
                                                                <td>{{ list.typ_title }}</td>
                                                                <td>
                                                                    <button @click="SelectAdviser(list.id)"
                                                                        class="btn btn-sm btn-round btn-info">Assign</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button @click="CancelAssignAdviser"
                                                    class="btn btn-round btn-info btn-block">Cancel</button>
                                            </div>
                                        </div>
                                        <div v-if="isAssignPanel == true" class="row text-center">
                                            <h6 class="col-md-12 text-center">Assign Panel</h6>
                                            <div class="col-md-4 mr-auto ml-auto"
                                                v-for="(panel,index) in groupinfo.panels" :key="panel.id">
                                                <label>Panel {{index+1}}</label>
                                                <div class="alert alert-info">
                                                    <button aria-hidden="true" class="close">
                                                        <i @click="SelectUpdatePanel(panel.id, panel.name)"
                                                            class="fas fa-user-edit"></i>
                                                    </button>
                                                    <span>{{ panel.name }} -- {{ panel.us_title }}</span>
                                                    <span>{{ panel.pan_reason }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mr-auto ml-auto mt-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="card-title text-center">Panel List</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6 v-if="isUpdatePanel == true" class="text-center">Update
                                                            Panel {{ PanelNametoUpdate }}</h6>
                                                        <div class="table-responsive">
                                                            <table class="table table-hovered">
                                                                <thead class="text-info">
                                                                    <tr>
                                                                        <td><strong>Name</strong></td>
                                                                        <td><strong>Specialty</strong></td>
                                                                        <td><strong>User Type</strong></td>
                                                                        <td><strong>Action</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="panel in getpanelList" :key="panel.id">
                                                                        <td>{{ panel.name }}</td>
                                                                        <td>{{ panel.specialty }}</td>
                                                                        <td>{{ panel.typ_title }}</td>
                                                                        <td>
                                                                            <button v-if="isUpdatePanel == false"
                                                                                @click="SelectPanel(panel.id)"
                                                                                class="btn btn-info btn-sm btn-round">Select</button>
                                                                            <button v-if="isUpdatePanel == true"
                                                                                @click="UpdatePanel(panel.id)"
                                                                                class="btn btn-info btn-sm btn-round">Update</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mr-auto ml-auto">
                                                <button @click="CancelAssignAdviser"
                                                    class="btn btn-round btn-info btn-block">Cancel</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="title text-center">Group Progress</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="title text-center">RC Progress</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <rc-progress v-if="this.groupinfo.info" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="title text-center">Adviser Progress</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <adviser-progress v-if="this.groupinfo.info" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="title text-center">Panel Progress</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <panel-progress v-if="this.groupinfo.info" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="adviser">
                                        <AdviserSubmission :user="user" />
                                    </div>
                                    <div class="tab-pane" id="panel">
                                        <Evaluation :getcaps1evalution="getcaps1evalution" />
                                        <Validation :getcaps1validation="getcaps1validation" />
                                    </div>
                                    <div class="tab-pane" id="minutes">
                                        <Minutes :capstone="capstone" />
                                    </div>
                                    <!-- <div class="tab-pane" id="message">
                                        <h4 class="title text-center">Group Schedule</h4>
                                    </div> -->
                                    <div class="tab-pane" id="submission">
                                        <Turnitin :getcaps1evalution="getcaps1evalution"
                                            :getcaps1validation="getcaps1validation" :grp="capstone" :user="user" />
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
    import AdminSidebar from './AdminSidebar'
    import AdviserSubmission from './Capstone1/AdviserSubmission'
    import Turnitin from './Capstone1/Turnitin'
    import Evaluation from './Capstone1/Evaluation'
    import Validation from './Capstone1/Validator'
    import Minutes from './Capstone1/Minutes'
    import datetime from 'vuejs-datetimepicker'

    import RCProgress from '../../components/Progress/RCProgress'
    import AdviserProgress from '../../components/Progress/AdviserProgress'
    import PanelProgress from '../../components/Progress/PanelProgress'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        props: ['user'],
        components: {
            'sidebar': AdminSidebar,
            datetime,
            'AdviserSubmission': AdviserSubmission,
            'Turnitin': Turnitin,
            'Evaluation': Evaluation,
            'Validation': Validation,
            'Minutes' : Minutes,

            'rc-progress' : RCProgress,
            'adviser-progress' : AdviserProgress,
            'panel-progress' : PanelProgress,
        },
        data() {
            return {
                isSelect: false,
                isAssignAdviser: false,
                isAssignPanel: false,
                isUpdatePanel: false,

                PanelIDtoUpdate: '',
                PanelNametoUpdate: '',

                capstone: {},
                members: {},
                adviser: {},
                panels: {},
                date: moment(Date.now()).format('MM/DD/YYYY')
            }
        },
        methods: {
            Select(index) {
                this.isAssignAdviser = false
                this.isAssignPanel = false
                this.isSelect = true
                this.capstone = this.getadminDashboard.c1[index]
                this.getGroupInfo(this.capstone.grp_id)

                let req = {
                    grp_id: this.capstone.grp_id,
                    id: ''
                }
                let req1 = {
                    grp: this.capstone.grp_id,
                    id: ''
                }
                this.getCapstone1checkDocs(req)
                this.getCapstone1checkSys(this.capstone.grp_id)
                this.getCapstone1Evaluation(req1)
                this.getCapstone1Validation(req1)
                this.getCapston1Grammarly(this.capstone.grp_id)
            },
            GetCapstoneDetails() {
                axios.get('../api/selectCap1/' + this.capstone.grp_id).then(res => {
                    this.members = res.data.members
                    this.adviser = res.data.adviser
                    this.panels = res.data.panels
                })
            },
            Unselect() {
                this.isSelect = false
                this.capstone = {}
            },
            AssignAdviser() {
                this.isAssignAdviser = true
            },
            AssignPanels() {
                this.isAssignPanel = true
            },
            SelectAdviser(id) {
                axios.post('../api/selectadviser', {
                    'id': id,
                    'grp_id': this.capstone.grp_id
                }).then(res => {
                    if (res.data.message == 'success') {
                        this.Alert('success', 'Successfully Assign')
                        this.getGroupInfo(this.capstone.grp_id)
                        this.isAssignAdviser = false
                    } else {
                        this.Alert('info', res.data.message)
                    }
                })
            },
            SelectPanel(id) {
                axios.post('../api/selectpanel', {
                    'id': id,
                    'grp_id': this.capstone.grp_id,
                }).then(res => {
                    if (res.data.message == 'success') {
                        this.Alert('success', 'Successfully Assign')
                        this.getGroupInfo(this.capstone.grp_id)
                    } else {
                        this.Alert('warning', res.data.message)
                    }
                })
            },
            SelectUpdatePanel(id, name) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change the Panel!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Update'
                }).then((result) => {
                    if (result.value) {
                        this.PanelIDtoUpdate = id
                        this.PanelNametoUpdate = name
                        this.isUpdatePanel = true
                    }
                })
            },
            UpdatePanel(id) {
                // alert('to replace'+this.PanelIDtoUpdate+' replace with' + id)
                axios.post('../api/changegrouppanel', {
                    old_id: this.PanelIDtoUpdate,
                    new_id: id,
                    grp_id: this.capstone.grp_id
                }).then(res => {
                    if (res.data.message == 'success') {
                        this.Alert('success', 'Successfully Update')
                        this.getGroupInfo(this.capstone.grp_id)
                        this.CancelAssignAdviser()
                    } else {
                        this.Alert('warning', res.data.message)
                    }
                })
            },
            CancelAssignAdviser() {
                this.isAssignAdviser = false
                this.isAssignPanel = false
                this.PanelIDtoUpdate = ''
                this.PanelNametoUpdate = ''
                this.isUpdatePanel = false
            },
            ShowConfirmation() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Approve!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Approve'
                }).then((result) => {
                    if (result.value) {
                        this.Capstone2Approval()
                    }
                })
            },
            Capstone2Approval() {
                axios.post('../api/capstoneapproval', this.capstone).then(res => {
                    if (res.data.message == 'success') {
                        this.Alert('success', 'Group Standing Updated')
                        this.capstone.grp_standing = 2
                        this.Unselect()
                        this.fetchadminDashboard();

                    } else {
                        this.Alert('info', res.data.message)
                    }
                })
            },
            Alert(icon, title) {
                toast.fire({
                    icon: icon,
                    title: title,
                })
            },
            ...mapActions(["fetchadminDashboard", "fetchallAdviserlist", "fetchallPanellist", "getGroupInfo",
                "getCapstone1checkDocs", "getCapstone1checkSys", "getCapstone1Evaluation", "getCapston1Grammarly",
                "getCapstone1Validation",
            ])
        },
        computed: mapGetters(['getadminDashboard', 'getadviserList', 'getpanelList', 'groupinfo', 'getcaps1checkdocs',
            'getcaps1evalution', 'getcaps1validation'
        ]),
        created() {
            this.fetchadminDashboard();
            this.fetchallAdviserlist();
            this.fetchallPanellist();
        }
    }

</script>
