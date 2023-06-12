<script lang="ts">
import { useModalStore } from "@/store/Modal";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

export default {
    setup() {
        const page = usePage();
        const about = (computed(() => page.props?.about)) as any;

        const app = (computed(() => page.props?.app)) as any;

        const modalStore = useModalStore();

        return {
            modalStore,
            about,
            app
        };
    },
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="aboutModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sobre</h5>
                    <button
                        type="button"
                        class="btn-close"
                        v-on:click="modalStore.closeModal()"
                    ></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center text-black-50">
                        <i class="fas fa-pizza-slice"></i> {{ app.appName }} <small>{{ app.appRelease }}</small>
                    </h3>

                    <hr/>

                    <p style="text-align: justify">
                        {{ about.description }}
                    </p>
                    <hr>

                    <p> - {{ app.appName }} {{ app.appRelease }} ({{ app.appVersion }})</p>

                    <p> - Versão do PHP: {{ app.phpVersion }}</p>

                    <div class="alert alert-success">
                        Agradecimentos especiais para <a href="https://inertiajs.com/" target="__blank">Inertia.JS</a> que possibilitou a integração entre o PHP e o Vue.JS
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</template>
