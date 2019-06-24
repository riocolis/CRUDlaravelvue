<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">InputForm</div>

                    <div class="card-body">
                        <input type="text" @change="changeInput" v-model="pesan"></input> {{pesan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                pesan: "hallo"
            }
        },
        methods: {
            changeInput: function(e){
                this.pesan = e.target.value;
                axios.post('http://localhost:8000/todos',{
                    nama: this.pesan
                }).then(response => {
                    console.log(response.data);
                })
            }
        },
    }
</script>
