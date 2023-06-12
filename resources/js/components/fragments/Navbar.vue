<script lang="ts">
// Store Imports
import { useDarkModeStore } from "@/store/DarkMode";
import { useModalStore } from "@/store/Modal";
// Component Imports
import About from "../About.vue";

// Other Imports
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

export default {
    setup() {
        const darkStore = useDarkModeStore();
        const modalStore = useModalStore();

        const page = usePage();
        const user = (computed(() => page.props?.user)) as any;

        const switchDarkMode = (param) => {
            darkStore.switchDarkMode();

            if (darkStore.darkMode === true) {
                param.mainNavbar?.classList.add("navbar-dark");
            } else {
                param.mainNavbar?.classList.remove("navbar-dark");
            }
        };


        const logoutUser = (e: Event) => {
            e.preventDefault();

            if (confirm("Certeza que deseja sair?")) {
                let el = e.target as HTMLLinkElement;

                location.href = el.href;
            } 
        }

        return {
            darkStore,
            switchDarkMode,
            modalStore,
            user,
            logoutUser
        };
    },
    components: {
        About,
    },
    mounted() {
        if (this.darkStore.darkMode === true) {
            const darkSwitch = this.$refs.darkSwitch as HTMLInputElement;
            darkSwitch.checked = true;
            (this.$refs.mainNavbar as HTMLElement)?.classList.add(
                "navbar-dark"
            );
        }
    },
};
</script>

<template>
    <nav class="navbar navbar-expand-lg" ref="mainNavbar">
        <div class="container">
            <Link class="navbar-brand" :href="$route('admin')">Home</Link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                id="navbarToggler"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li
                        class="nav-item"
                        v-on:click="modalStore.openModal('#aboutModal')"
                    >
                        <button class="nav-link">Sobre</button>
                    </li>

                    <li class="nav-item">
                        <Link :href="$route('app.vue.home')" class="nav-link">Legacy</Link>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-user-circle"></i>
                            {{ user?.first_name }}
                            {{ user?.last_name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="dropdown-item"
                                    >Editar usuário</a
                                >
                            </li>
                            <hr class="dropdown-divider" />
                            <li>
                                <a class="dropdown-item" id="btnLogout" :href="$route('admin.logout')" v-on:click="(e) => logoutUser(e)">Logout</a>
                                
                            </li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <div class="form-check form-switch">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="darkSwitch"
                                ref="darkSwitch"
                                v-on:change="switchDarkMode($refs)"
                            />
                            <label class="custom-control-label" for="darkSwitch"
                                >Modo Escuro</label
                            >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <About />

</template>
