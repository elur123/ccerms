<script>
import {HorizontalBar} from 'vue-chartjs'
import { mapGetters, mapActions } from 'vuex'
    export default {
        extends: HorizontalBar,
        data(){
            return{
                groupname:[],
                grouppercent:[]
            }
        },
        methods: {
            getGroup(){
                 this.renderChart({
                    labels: this.groupname,
                    datasets:[{
                        label: 'Student Progress',
                        backdropColor:'#cfd602',
                        backgroundColor: '#cfd602',
                        data:this.grouppercent,
                    }]
                },
                    {
                        responsive:true,
                        maintainAspectRatio: false,
                        scales:{
                            xAxes:[{
                                ticks:{
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                )
            },
        },
        computed: mapGetters(['getadminDashboard']),
        mounted() {
            for (const key in this.getadminDashboard.c1) {
                this.groupname[key] = this.getadminDashboard.c1[key].grp_title,
                this.grouppercent[key] = this.getadminDashboard.c1[key].grp_percent
            }
            this.getGroup()
        }
    }
</script>
