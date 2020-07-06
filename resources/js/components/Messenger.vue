<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="message-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="card-title text-center" v-if="isGroupChat == true">
                            Group Chat List
                        </h4>
                        <h4 class="card-title text-center" v-if="isGroupChat == false">
                            User Chat List
                        </h4>
                    </div>
                    <div class="card-body" v-if="isGroupChat == false">
                        <div class="row">
                            <div class="col-md-12" v-for="user in getmessenger.users" :key="user.id">
                                <div class="card card-testimonial">
                                     <div class="card-header card-header-avatar">
                                        <a href="#">
                                            <img src="/nowasset/assets/img/default-avatar.png" class="img img-raised">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="title text-center" style="font-size:15px;line-height:1px;">{{ user.name }}</p>
                                        <p class="title text-center" style="font-size:12px;">{{ user.typ_title }}</p>
                                         <i class="fas fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="isGroupChat == true">
                        <div class="row">
                            <div class="col-md-12" v-for="grp in getmessenger.groups" :key="grp.grp_id">
                                <div class="card card-testimonial">
                                     <div class="card-header card-header-avatar">
                                        <a href="#">
                                            <img src="/nowasset/assets/img/default-avatar.png" class="img img-raised">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="title text-center" style="font-size:15px;line-height:1px;">{{ grp.grp_title }}</p>
                                        <p class="title text-center" style="font-size:12px;">{{ grp.crs_title }}</p>
                                        <i class="fas fa-paper-plane"></i>
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
import {mapGetters} from 'vuex'
export default {
    props:['isGroupChat'],
    computed: mapGetters(['getmessenger'])
}
</script>
<style scoped>
.card-testimonial .card-body {
    padding-top: 5px;
}
.message-body{
    height: 520px;
}
</style>
