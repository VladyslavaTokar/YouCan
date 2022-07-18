<template>
    <div class="todoListContainer">
        <div class="heading">
            <h3 id="title">What do you want to do today? </h3>
            <add-item-form 
            v-on:reloadlist="getList()"
            />
        </div>
        <list-view 
        :items="items" 
        v-on:reloadlist="getList()"
        />
    </div>
</template>

<script>

import addItemForm from "./addItemForm"
import listView from "./listView"

export default {
    components:{
        addItemForm,
        listView
    },
    data: function(){
        return{
            items: []
        }
    },
    methods: {
        getList(){
            axios.get('api/items')
            .then(response => {
                this.items = response.data
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created(){
        this.getList();
    }
}
</script>

<style scoped>

.todoListContainer{
    width: fit-content;
    margin: auto;
    background: #F5F6F6;
    border-radius: 30px;
    margin: 10px;
    justify-content: center;
    align-items: center;
    padding-bottom: 10px;
}

.heading{
    /*background: #F9F5FF;*/
    padding: 10px;
}
#title{
    padding-bottom: 10px;
    text-align: center;
    color: #563440;
}

</style>

