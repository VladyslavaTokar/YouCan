<template>
    <div class="addItem">
        
            <input type="test" v-model="item.name" placeholder="add your task"/>
            <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[item.name ? 'active' : 'inactive', 'plus' ]"
            />

            <!-- <button></button> -->
    </div>
   
</template>

<script>
export default {
    data: function() {
        return {
            item: {
                name: ""
            }
        }
    },
    methods:{
        addItem() {
            if(this.item.name == ''){
                return;
            }
            axios.post('api/item/store', {
                item: this.item
            })
            .then( response => {
                if (response. status == 201) {
                    this.item.name = '';
                    this.$emit('reloadlist');
                }
            })
            .catch(error =>{
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>

.addItem{
    display: flex;
    justify-content: center;
    align-items: center;
}

input{
    background: #F5F6F6;
    border: 1px solid #563440;
    border-radius: 6px;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus{
    font-size: 20px;

}

.active{
    color: #6667AB;
}

.inactive{
    color: #999999;
}

</style>