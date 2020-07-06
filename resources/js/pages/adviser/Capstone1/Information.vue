<template>
    <div>
        <h4 class="title text-center">Group Information</h4>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <p style="font-size:15px;" class="category text-center">Group Members:
                </p>
                <h6 class="text-center" v-for="mem in members" :key="mem.id">
                    {{ mem.name }}</h6>
            </div>
            <div class="col-md-4">
                <p style="font-size:15px;" class="category text-center">Group Panels:
                </p>
                <h6 class="text-center" v-for="pans in panels" :key="pans.id">
                    {{ pans.name }}</h6>
            </div>
            <div class="col-md-4">
                <p style="font-size:15px;" class="category text-center">Status</p>
                <h6 class="text-center">{{ grp.styp_title }}</h6>
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
</template>
<script>
    import {
        mapGetters,
        mapActions
    } from 'vuex'
    import RCProgress from '../../../components/Progress/RCProgress'
    import AdviserProgress from '../../../components/Progress/AdviserProgress'
    import PanelProgress from '../../../components/Progress/PanelProgress'
    export default {
        props: ['grp'],
        components: {
            'rc-progress': RCProgress,
            'adviser-progress': AdviserProgress,
            'panel-progress': PanelProgress,
        },
        data() {
            return {
                members: {},
                panels: {}
            }
        },
        methods: {
            GetCapstoneDetails() {
                axios.get('../api/selectCap1/' + this.grp.grp_id).then(res => {
                    this.members = res.data.members
                    this.panels = res.data.panels
                })
            },
        },
        created() {
            this.GetCapstoneDetails()
        },
        computed: mapGetters(['groupinfo'])
    }

</script>
