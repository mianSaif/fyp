<template>
    <div>

        <select @change="myFunction()" v-model="sel" name="">
            <option value="">--Select</option>
            <option value="PK">Pakistan</option>
            <option value="IN">India</option>
<!--            <option v-for="city in head" v-bind:value="city.city_name">{{ city.city_name }}</option>-->
        </select>
    </div>
</template>

<script>
export default {
    name: "test",
    data(){
        return  {

           sel: ""
        }
    },
    methods : {
        myFunction: function() {
            var context = this;
            Vue.nextTick(function () {
                alert(context.myModel);
            })
        }
    }
}
</script>

<style scoped>

</style>
