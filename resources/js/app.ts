import { createApp, h } from "vue"
import { createInertiaApp } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import $ from "jquery";
import { createPinia } from 'pinia';
import { ZiggyVue } from 'ziggy-vue';
import route from 'ziggy';
import "bootstrap";

const pinia = createPinia()

createInertiaApp({
    id: "app",
    resolve: (name) => {
        const pages = (import.meta as any).glob('./components/**/*.vue', { eager: true });
        return pages[`./components/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) });
        vueApp.use(plugin)
            .use(pinia)
            .use(ZiggyVue)
            .component("Link", Link);

        vueApp.config.globalProperties.$route = route;
        vueApp.mount(el);
    },
});

window.addEventListener("load", () => {
    setTimeout(() => {
        $("#loader_container").fadeOut();
    }, 1000)
})