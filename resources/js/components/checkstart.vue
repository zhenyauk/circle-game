<template>
    <div >

    </div>
</template>

<script>
export default {
    props:[
        'gid'
    ],
    data(){
        return {
            users: {},
        }
    },
    mounted() {

        window.setInterval(() => {
            this.getUsers()
        },3000);

    },
    methods:{
        getUsers()
        {
            axios
                .get('/game/check-start/' + this.gid)
                .then(res => {
                    if(res.data.status === 1){
                        location.href = '/game/start'
                    }

                })
        }
    }
}
</script>
