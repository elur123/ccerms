<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="msg-header" v-if="select.userid != ''">
                                <div class="msg-header-img">
                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                </div>
                                <div class="active">
                                    <h4>{{ select.username }}</h4>
                                    <!-- <h6>3 hours ago</h6> -->
                                </div>
                            </div>
                            <div class="msg-header" v-if="select.grpid != ''">
                                <div class="msg-header-img">
                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                </div>
                                <div class="active">
                                   <h4 >{{ select.grpname }}</h4>
                                    <!-- <h6>3 hours ago</h6> -->
                                </div>
                            </div>
                            <div class="msg-header" v-if="select.userid == '' && select.grpid == ''">
                                <div class="active">
                                    <h4>Select User First</h4>
                                </div>
                            </div>
                            <div class="chat-page">
                                <div class="msg-inbox">
                                    <div class="chats">
                                        <div class="msg-page">
                                            <div class="received-chats">
                                                <div class="received-chats-img">
                                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                                </div>
                                                <div class="received-msg">
                                                    <div class="received-msg-inbox">
                                                        <p>Tirada choy</p>
                                                        <span class="time">11:01 PM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="outgoing-chats">
                                                <div class="outgoing-chats-msg">
                                                    <div class="outgoing-msg-inbox">
                                                        <p>Wala lagi choy</p>
                                                        <span class="time">11:01 PM</span>
                                                    </div>
                                                </div>
                                                <div class="outgoing-chats-img">
                                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="outgoing-chats">
                                                <div class="outgoing-chats-msg">
                                                    <div class="outgoing-msg-inbox">
                                                        <p>Wala lagi choy</p>
                                                        <span class="time">11:01 PM</span>
                                                    </div>
                                                </div>
                                                <div class="outgoing-chats-img">
                                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="received-chats">
                                                <div class="received-chats-img">
                                                    <img src="/nowasset/assets/img/james.jpg" alt="">
                                                </div>
                                                <div class="received-msg">
                                                    <div class="received-msg-inbox">
                                                        <p>Tirada choy</p>
                                                        <span class="time">11:01 PM</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="msg-bottom">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Write a message">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-paper-plane"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" v-if="isGroupChat == true">
                            Group Chat List
                            <div class="row mb-2">
                                <div class="col-md-10 mr-auto ml-auto">
                                    <div class="from-group">
                                        <input type="text" class="form-control" placeholder="Group User">
                                    </div>
                                </div>
                            </div>
                        </h4>
                        <h4 class="card-title text-center" v-if="isGroupChat == false">
                            User Chat List
                            <div class="row mb-2">
                                <div class="col-md-10 mr-auto ml-auto">
                                    <div class="from-group">
                                        <input type="text" class="form-control" placeholder="Search User">
                                    </div>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body mt-2" v-if="isGroupChat == false">
                        <div class="row">
                            <div class="col-md-12" v-for="(user, index) in getmessenger.users" :key="user.id">
                                <div class="card card-testimonial">
                                     <div class="card-header card-header-avatar">
                                        <a href="#">
                                            <img src="/nowasset/assets/img/default-avatar.png" class="img img-raised">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="title text-center" style="font-size:15px;line-height:1px;">{{ user.name }}</p>
                                        <p class="title text-center" style="font-size:12px;">{{ user.typ_title }}</p>
                                        <button class="btn btn-round btn-sm btn-info" @click="SelectUser(index, 1)"><i class="fas fa-paper-plane"></i> Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="isGroupChat == true">
                        <div class="row">
                            <div class="col-md-12" v-for="(grp, index) in getmessenger.groups" :key="grp.grp_id">
                                <div class="card card-testimonial">
                                     <div class="card-header card-header-avatar">
                                        <a href="#">
                                            <img src="/nowasset/assets/img/default-avatar.png" class="img img-raised">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="title text-center" style="font-size:15px;line-height:1px;">{{ grp.grp_title }}</p>
                                        <p class="title text-center" style="font-size:12px;">{{ grp.crs_title }}</p>
                                        <button class="btn btn-round btn-sm btn-info" @click="SelectUser(index, 2)"><i class="fas fa-paper-plane"></i> Select</button>
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
    props:['isGroupChat','user'],
    data(){
        return{
            select:{
                userid: '',
                username:'',
                grpid: '',
                grpname:'',
            }
        }
    },
    methods:{
        SelectUser(index, type){
            if (type == 1) {
                this.select.userid = this.getmessenger.users[index].id
                this.select.username = this.getmessenger.users[index].name
                this.select.grpid = 0
                this.select.grpname = 0
            }
            else{
                 this.select.userid = 0
                this.select.username = 0
                this.select.grpid = this.getmessenger.groups[index].grp_id
                this.select.grpname = this.getmessenger.groups[index].grp_title
            }

        }
    },
    computed: mapGetters(['getmessenger']),

}
</script>
<style scoped>
.card-testimonial .card-body {
    padding-top: 5px;
}
.container{
    max-width: 500 !important;
    margin: auto;
    margin-top: 4%;
    font-family: sans-serif;
    letter-spacing: 0.5px;
}
.msg-header{
    border: 1px solid #ccc;
    width: 100%;
    height: 10%;
    border-bottom: none;
    display: inline-block;
    background-color: #007bff;

}
.msg-header-img img{
    max-width: 100%;
    border-radius: 50%;
    margin-top :20px;
}
.msg-header-img{
    border-radius: 50%;
    width: 40px;
    margin-left: 5%;
    margin-top: 2px;
    float: left;
}
.active{
    width: 120px;
    float: left;
    margin-top: -5px;
}
.active h4{
    font-size: 20px;
    margin-left: 10px;
    color: #fff;
    margin-bottom: 2px;
    width: 140px;
}
.active h6{
    font-size:10px;
    margin-left: 10px;
    line-height: 2px;
    color: #fff;
}
.received-chats-img img{
    max-width: 100%;
    border-radius: 50%;
    margin-top :20px;
}
.chat-page{
    padding: 0 0 10px 0;
}
.msg-inbox{
    border:1px solid #ccc;
    overflow: hidden;
    padding-bottom: 30px;
}
.chats{
    padding: 30px 15px 0 25px;
}
.msg-page{
    height: 516px;
    overflow-y: auto;
}
.received-chats-img{
    display: inline-block;
    width: 20px;
    float: left;
}
.received-msg{
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
}
.received-msg-inbox{
    width: 57%;
}
.received-msg-inbox p{
    background: #efefef none repeat scroll 0 0;
    border-radius: 10px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 1pc 10px 5px 12px;
    width: 100%;
}
.time{
    color: #777;
    display: block;
    font-size: 12px;
    margin:8px 0 0;
}
.outgoing-chats-img img{
    max-width: 100%;
    border-radius: 50%;

}
.outgoing-chats{
    overflow: hidden;
    margin: 26px 20px;
}
.outgoing-chats-msg{
    float: left;
    width: 46%;
    margin-left: 45%;

}
.outgoing-chats-msg p{
    background: #007bff none repeat scroll 0 0;
    color: #fff;
    border-radius: 10px;
    font-size: 14px;
    margin: 0;
    color: #fff;
    padding: 5px 10px 5px 12px;
    width: 100%;
}
.outgoing-chats-img{
    display: inline-block;
    width: 20px;
    float: right;
}
</style>
