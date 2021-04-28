<template>
<div>
    <app-header :key="headerKey" ></app-header>
    <loading v-if="$root.loading"></loading>
    <router-view v-else v-bind:activeHeaderFooter="activeHeaderFooter" v-on:update="make_update($event)"></router-view>
    <app-footer v-if="change"></app-footer>
</div>
</template>

<script>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
import ChatArea from '../components/ChatArea.vue';
import {mapMutations} from "vuex";
import {EventBus} from '../app';
export default {
    name: "MainApp",
    props : ["userId"],
    components : {
            AppHeader,
            AppFooter,
            ChatArea
    },
    data() {
        return {
            activeHeaderFooter : true,
            headerKey : 0
        }
    },
    mounted() {
        this.userStatus(this.userId);
        // EventBus.$on('loadHeader', data=> {
        //     alert();
        // });
    },
    methods :  {
        ...mapMutations(["updateData"]),
        make_update(val) {
            this.activeHeaderFooter = val;
        },
        userStatus(param) {
            this.updateData({status:param});
        }
    },
    computed : {
        change() {
            return this.activeHeaderFooter;
        }
    }

}
</script>

<style scoped>

</style>
