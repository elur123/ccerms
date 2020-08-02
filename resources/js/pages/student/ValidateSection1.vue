<template>
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="mdlSection">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center">Group Section for Capstone 1</h5>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning text-center">
                        <span>
                            Select Section That you want to join.
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Section</label>
                                <select class="form-control" v-model="details.secid">
                                    <option v-for="s in sections" :key="s.sec_id" :value="s.sec_id">{{ s.sec_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mr-auto ml-auto">
                            <button class="btn btn-warning btn-round btn-block" @click="UpdateSection">Update</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['grp','sections'],
        data(){
            return{
                loading: false,
                details:{
                    grpid:'',
                    secid:'',
                    type: 1,
                }
            }
        },
        methods:{
            UpdateSection(){
                this.loading = true
                this.details.grpid = this.grp.grp_id
                axios.post('../api/updategroupsection', this.details).then(res => {
                    if (res.data.message == 'success') {
                        this.loading = false
                        this.grp.sec_id = this.details.secid
                        this.Alert('success', 'Successfully Updated')
                        $('#mdlSection').modal('show')
                    }
                    else{
                        this.loading = false
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
        },
        mounted(){
            $('#mdlSection').modal('show')
        }
    }

</script>
