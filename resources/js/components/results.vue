<template>
    <div class="card" >
        <img class="card-img-top"  >
        <div class="card-body">
            <h5 class="card-title">Учасники</h5>
            <div id="allusers">
                <div v-for="user in users">
                    <div>{{user.name}} -
                        <span style="color:blueviolet" v-if="user.current_question == 6"> Готовий! </span>
                        <span style="color:blueviolet" v-else-if="user.current_question == 0" > Готовий! </span>
                        <span v-else>{{user.current_question}}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {

    data(){
        return {
            users: {},
        }
    },
    mounted() {
        console.log(' RESULTS!! ')
        window.setInterval(() => {
            this.getUsers()
        },5000);

    },
    methods:{
        getUsers()
        {
            axios
                .get('/game/check-results')
                .then(res => {
                    console.log(res.data.status)
                    if(res.data.status == 'ok'){
                        location.href = '/game/results'
                    }
                    //this.users = res.data.users
                })
        }
    }
}
</script>
