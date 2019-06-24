<template>
    <ul>
        <li v-for="data in datas">
             <p v-if="data.status == 1">
                <input type="checkbox" checked @click="changeStatus(data.id)"/>
                {{data.nama}} 
                <button @click="deleteThis(data.id)" >Delete</button> 
            </p>
            <p v-else> 
                <input type="checkbox" @click="changeStatus(data.id)"/>
                {{data.nama}} 
                <button @click="deleteThis(data.id)" >Delete</button> 
            </p>
        </li>
    </ul>
</template>

<script>
export default {
    methods: {
        changeStatus: function(id){
            axios.put('http://localhost:8000/todos/'+id)
            .then(respone => {
                console.log(respone.data)
            });
        },
        deleteThis: function(id){
            ///console.log(id)
            axios.delete('http://localhost:8000/todos/'+id)
                .then(respone =>{
                    //console.log(respone.data);
                    this.data = this.datas.filter(data => {
                        return data.id != respone.data.id;
                    })
                    console.log(this.datas)
                });
        }
    },

    beforeCreate(){
        axios.get('http://localhost:8000/todos')
            .then(respone => {
                ///console.log(respone.data);
                this.datas = respone.data
            })
    },
    data: function(){
        return{
            datas: [
            ]
        }
    }
}
</script>