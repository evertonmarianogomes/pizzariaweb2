<script lang="ts">
import Navbar from "@/components/fragments/Navbar.vue";
import { useDarkModeStore } from "@/store/DarkMode";
import { Head } from "@inertiajs/vue3";
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'


export default {
    setup() {
        const page = usePage()
        
        const app =  computed(() =>  page.props?.app) as any;

        const darkStore = useDarkModeStore();
        return {
          darkStore,
          app
        };
    },
    props: {
        User: Object,
        Title: String
    },
    components: {
        Navbar,
        Head
    },
    mounted() {},
};
</script>

<template>
    <Head :title=Title />
    <div>
        <Navbar/>

        <slot />
        
        <div class="w-100 text-center mt-5">
            <code>
                <p>&copy; {{ app.appName }} {{ app.appRelease }}</p>
                <p>For testing purposes only. Version {{ app.appVersion }}</p>
                <p>Laravel v {{ app.laravelVersion }} - PHP v {{ app.phpVersion }}</p>
            </code>
        </div>
    </div>
</template>
