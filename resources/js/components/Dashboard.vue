<script lang="ts">
import { useDarkModeStore } from "@/store/DarkMode";
import Layout from "./Layout.vue";


export default {
    setup() {
        const darkStore = useDarkModeStore();
        return {
            darkStore,
        };
    },
    props: {
        user: Object,
        Title: String
    },
    components: {
        Layout: Layout,
    },
    mounted() {},
};
</script>

<template>
    <Layout :Title=Title :User=user>
        <div class="container pt-3">
            <h3>Bem vindo {{  user?.first_name }}</h3>
        </div>
    </Layout>
</template>
