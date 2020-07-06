<template>
    <div class="col-md-10 mr-auto ml-auto mt-3">
        <form-wizard  color="#f44336" :start-index="start" ref="wizzard">
            <h2 slot="title">You are almost there!</h2>
            <p slot="title">Just a littile more Information. Join or Create into your Group and Join to Section using
                your Subject Code.</p>
            <tab-content title="Join/Create Group" icon="fas fa-users">
                <div v-if="showGroup == true">
                    <div v-if="showJoin == false" class="card text-center">
                        <div class="card-header text-white pb-2" style="background-color:#f44336;">
                            <h3 class="card-title">Create Group</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Group Name</label>
                                    <div class="form-group">
                                        <input type="text" v-model="groupName" class="form-control text-center"
                                            placeholder="Enter of your Group Name...">
                                    </div>
                                    <p class="text-primary" style="font-size:12px;">{{ error.grpName }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label>Group Course</label>
                                    <div class="form-group">
                                        <select class="form-control" v-model="crs_id">
                                            <option v-for="crs in course" :key="crs.crs_id" :value="crs.crs_id">
                                                {{ crs.crs_title }}</option>
                                        </select>
                                    </div>
                                    <p class="text-primary" style="font-size:12px;">{{ error.grpCourse }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Group Research Title</label>
                                    <div class="form-group">
                                        <input type="text" v-model="groupResearchTitle" class="form-control text-center"
                                            placeholder="Enter of your Group Research Title...">
                                    </div>
                                    <p class="text-primary" style="font-size:12px;">{{ error.grpresearchtitle }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mr-auto ml-auto">
                                    <button @click="CreateGroup" class="btn btn-info btn-round btn-block" :disabled="loading == true"><i
                                            class="fas fa-arrow-right"></i> Create Group</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-if="showJoin == false" class="text-center">Or Just <a @click="clickshowJoin('join')"
                            href="#">Join</a> your Group!</p>
                    <div v-if="showJoin == true" class="card text-center">
                        <div class="card-header text-white pb-2" style="background-color:#f44336;">
                            <h3 class="card-title">Join Group</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hovered">
                                    <thead class="text-info">
                                        <tr>
                                            <th><strong>Group Name</strong></th>
                                            <th><strong>Group Title</strong></th>
                                            <th><strong>Group Course</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(group,index) in groups" :key="group.grp_id">
                                            <td>{{ group.grp_title }}</td>
                                            <td>{{ group.grp_researchtitle }}</td>
                                            <td>{{ group.crs_title }}</td>
                                            <td>
                                                <button class="btn btn-info btn-round btn-sm" @click="showModalJoin(index)">Join</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="mdlJoinGroup">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center bg-info">
                                            <h4 class="title title-up">Join Group <p>{{ grp.grp_title }}</p></h4>

                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-10 mr-auto ml-auto">
                                                    <div class="form-group">
                                                        <input type="text" v-model="groupCode" class="form-control text-center" placeholder="Enter Your Group Code...">
                                                    </div>
                                                    <p class="text-primary" style="font-size:12px;">{{ error.groupCode }}</p>
                                                </div>
                                                <div class="col-md-8 mr-auto ml-auto">
                                                    <button @click="JoinGroup" class="btn btn-info btn-round btn-block" :disabled="isloading == true"><span v-if="isloading == true" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Join</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-if="showJoin == true" class="text-center">Or Just <a @click="clickshowJoin('create')"
                            href="#">Create</a> your Group!</p>
                </div>
                <div v-if="showGroup == false" class="text-center mt-2" >
                    <h3 style="line-height:0px;">Already Have a Group</h3>
                    <p>Proceed to the Joining of Section!</p>
                </div>
            </tab-content>
            <tab-content title="Join Section" icon="fas fa-book">
                <div class="card text-center">
                    <div class="card-header text-white pb-2" style="background-color:#f44336;">
                        <h3 class="card-title">Join Section</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input v-model="sec_code" type="text" class="form-control text-center"
                                placeholder="Enter of your Subject Code...">
                        </div>
                         <p class="text-primary" style="font-size:12px;">{{ error.sec_code }}</p>
                        <div class="row">
                            <div class="col-md-6 mr-auto ml-auto">
                                <button @click="JoinSection" class="btn btn-info btn-round btn-block" :disabled="loading == true"><i class="fas fa-arrow-right"></i>
                                    Join</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <template slot="footer">
                <div class="wizard-footer-right">

                </div>
            </template>
        </form-wizard>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                groupName: '',
                groupResearchTitle: '',
                crs_id: '',
                loading: false,

                groupCode:'',

                sec_code:'',

                start: 0,
                showJoin: false,
                showGroup:true,
                isloading: false,
                error: {
                    grpName: '',
                    grpCourse: '',
                    grpresearchtitle: '',
                    sec_code:'',
                    groupCode:'',

                },
                course: [],
                groups:[],
                grp:{},
            }
        },
        props: ['user'],
        methods: {
            getCourse() {
                axios.get('../api/Dependencies').then(res => {
                    this.course = res.data.studCourse
                })
                axios.get('../api/Capstone1Info').then(res => {
                    this.groups = res.data.cap1
                })
            },
            Alert(icon, title) {
                toast.fire({
                    icon: icon,
                    title: title,
                })
            },
            clickshowJoin(str) {
                if (str == 'join') {
                    this.showJoin = true
                } else {
                    this.showJoin = false
                }
            },
            CreateGroup() {
                if (this.groupName == '') {
                    this.error.grpName = 'Enter your Group Name'
                    if (this.crs_id != '') {
                        this.error.grpCourse = ''
                    }
                    if (this.groupResearchTitle != '') {
                        this.error.grpresearchtitle = ''
                    }

                }
                if (this.crs_id == '') {
                    this.error.grpCourse = 'Enter your Group Course'
                    if (this.groupName != '') {
                        this.error.grpName = ''
                    }
                    if (this.groupResearchTitle != '') {
                        this.error.grpresearchtitle = ''
                    }

                }
                if (this.groupResearchTitle == '') {
                    this.error.grpresearchtitle = 'Enter your Group Research title'
                    if (this.groupName != '') {
                        this.error.grpName = ''
                    }
                    if (this.crs_id != '') {
                        this.error.grpCourse = ''
                    }
                } else {
                    this.loading = true
                    axios.post('../api/createGroup', {
                        'groupName': this.groupName,
                        'groupResearchTitle': this.groupResearchTitle,
                        'crs_id': this.crs_id,
                        'id': this.user.id
                    }).then(res => {
                        if (res.data.message == 'Success') {
                            this.loading = false
                            this.Alert('success', 'Successfully Created!')
                            this.$refs.wizzard.nextTab();
                            this.error = {
                                grpName: '',
                                grpCourse: '',
                                grpresearchtitle: ''
                            }
                            this.groupName = ''
                            this.crs_id = ''
                            this.groupResearchTitle = ''
                            this.showGroup = false
                        } else {
                            this.loading = false
                            this.Alert('info', 'Somethings went wrong')
                            this.error.grpName = res.data.message
                        }
                    })

                }
            },
            showModalJoin(index){
                this.grp = this.groups[index]
                $('#mdlJoinGroup').modal('show')
            },
            JoinGroup(){
                this.isloading = true
                if(this.groupCode == ''){
                    this.isloading = false
                    this.error.groupCode = 'Please provide group Code!'
                }
                else{
                    this.loading = true
                    axios.post('../api/JoinGroup',{
                        'id': this.user.id,
                        'grp_id' : this.grp.grp_id,
                        'grp_code' : this.groupCode
                    }).then(res => {
                        if(res.data.message == 'Success'){
                            this.loading = false
                            this.Alert('success', 'Successfully Joined!')
                            this.$refs.wizzard.nextTab();
                            this.isloading = false
                            this.showGroup = false
                            this.error.groupCode = ''
                            this.groupCode = ''
                            $('#mdlJoinGroup').modal('hide')
                        }
                        else{
                            this.isloading = false
                            this.error.groupCode = res.data.message
                        }
                    })
                }
            },
            JoinSection(){
                if(this.sec_code == ''){
                    this.error.sec_code  = 'Enter Your Subject Code'
                }
                else{
                    axios.post('../api/JoinSection', {
                        'sec_code' : this.sec_code,
                        'id' : this.user.id
                    }).then(res => {
                        if(res.data.message == 'Success'){
                            this.Alert('success', 'Successfully Join to Section')
                            this.error.sec_code = ''
                            this.$router.push('/student/dashboard')
                            location.reload()
                        }
                        else{
                            this.Alert('info', 'Somethings went wrong')
                            this.error.sec_code = res.data.message
                        }
                    });
                }
            }
        },
        created() {
            this.getCourse()
            if(this.user.us_id == 3){
                this.$router.push('/account/conflictAccount')
                location.reload()
            }
            if (this.user.grp_id == 1) {
                this.start = 0
                console.log('0')
            } else {
                this.showGroup = false
                this.start = 1
            }
        }
    }

</script>
