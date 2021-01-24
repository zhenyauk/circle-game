<template>
    <div class="card" >
        <img class="card-img-top"  >
        <div class="card-body">
            <h5 class="card-title">Учасники</h5>
            <div id="allusers">
                <div v-for="user in users">
                    <div>{{user.name}} -
                        <span style="color:blueviolet" v-if="user.current_question == 6"> Готовий! </span>
                        <span style="color:blueviolet" v-else-if="user.current_question == 0" > Старт! </span>
                        <span v-else>{{user.current_question}}</span>
                        <span v-if="admin == 1">
                            <a  style="font-weight:bold; color:red" :href="'/user/del/' + user.id">X</a>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props:[
        'gid',
        'admin'
    ],
    data(){
        return {
            users: {},
        }
    },
    mounted() {
        console.log(' USERS!! ')
        window.setInterval(() => {
            this.getUsers()
        },4000);

    },
    methods:{
        getUsers()
        {
            axios
                .get('/game/get-users/' + this.gid)
                .then(res => {
                    this.users = res.data.users
                })
        }
    }
}
</script>
