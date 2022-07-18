<template>
    <div>
        <div v-for ="(item, index) in items" :key="index" >
            <list-item
                :item="item"
                class="item"
                v-on:itemchanged="$emit('reloadlist')"
                /> 
        </div>    
        
    </div>
</template>

<script>
import listItem from "./listItem";
import ListItem from './listItem.vue';

export default {
    components: {
        listItem
    },
    props: ["items"]
};
</script>

<style scoped>

.title{
    color: #563440;
}

.item{
    color: #563440;
    padding: 5px;
    margin-top: 5px;
}

</style>