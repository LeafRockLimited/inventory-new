<template>
    <div>

        <Navbar />
        <div class="min-h-screen bg-base-200 dark:bg-custom-main-background">
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>


<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

export default {
    components: {
        ApplicationLogo,
        Dropdown,
        DropdownLink,
        NavLink,
        ResponsiveNavLink,
        Link,Navbar
    },
    data() {
        return {
            showingNavigationDropdown: false,
            theme: window.localStorage.theme
        };
    },
    methods: {
       
    },
}
</script> 