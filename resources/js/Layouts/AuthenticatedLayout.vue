<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
export default {
    components: {
        ApplicationLogo,
        Dropdown,
        DropdownLink,
        NavLink,
        ResponsiveNavLink,
        Link
    },
    data() {
        return {
            showingNavigationDropdown: false,
            theme: window.localStorage.theme
        };
    },
    methods: {
        darkModeToggle(){
            if (window.localStorage.theme == 'dark') {
                window.localStorage.theme = 'light'
                this.theme = 'light'
                document.documentElement.classList.remove('dark')
            }else{
                window.localStorage.theme = 'dark'
                this.theme = 'dark'
                document.documentElement.classList.add('dark')
            }
        }
    },
}
</script> 
<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-custom-main-background">
            <nav class="bg-white dark:bg-custom-red border-b border-gray-100 dark:border-none">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-neutral-900 dark:text-white"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink class="text-neutral-900 dark:text-white" :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center space-x-4 sm:ms-6">
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 
                                                border border-rose-500 dark:border-white text-sm leading-4 font-medium rounded-md
                                                text-neutral-800 dark:text-white bg-white dark:bg-transparent
                                                hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                            <button @click="darkModeToggle">
                                <svg v-if="theme == 'dark'" xmlns="http://www.w3.org/2000/svg" class="text-white w-6" viewBox="0 0 26 26">
                                    <g fill="none"><defs><mask id="pepiconsPopMoonCircleFilled0"><path fill="#fff" d="M0 0h26v26H0z"/><path fill="#000" fill-rule="evenodd" d="M11.764 9.128a4.506 4.506 0 0 1 2.6-3.196c.93-.41.727-1.784-.281-1.908c-4.612-.566-8.921 2.498-9.895 7.078c-1.035 4.87 2.067 9.656 6.93 10.69c4.862 1.033 9.642-2.078 10.677-6.947a9.045 9.045 0 0 0 .195-2.166c-.032-1.019-1.388-1.343-1.877-.449a4.504 4.504 0 0 1-4.885 2.245a4.505 4.505 0 0 1-3.464-5.347m-.23 10.708c-3.782-.804-6.195-4.528-5.39-8.318a7.022 7.022 0 0 1 4.727-5.23a6.512 6.512 0 0 0-1.063 2.424c-.747 3.516 1.493 6.973 5.005 7.72a6.487 6.487 0 0 0 4.636-.751c-1.273 3.053-4.57 4.866-7.916 4.155" clip-rule="evenodd"/></mask></defs><circle cx="13" cy="13" r="13" fill="currentColor" mask="url(#pepiconsPopMoonCircleFilled0)"/></g>
                                </svg>
                                <svg v-if="theme == 'light'" xmlns="http://www.w3.org/2000/svg" class="text-rose-600 w-6" viewBox="0 0 26 26">
                                    <g fill="none"><defs><mask id="pepiconsPopSunCircleFilled0"><path fill="#fff" d="M0 0h26v26H0z"/><g fill="#000"><path fill-rule="evenodd" d="M13 17a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0-6a2 2 0 1 1 0 4a2 2 0 0 1 0-4" clip-rule="evenodd"/><path d="M3.5 13a1 1 0 0 1 1-1h2a1 1 0 0 1 0 2h-2a1 1 0 0 1-1-1m15 0a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1M17 17a1 1 0 0 1 1.414 0l1.414 1.414a1 1 0 1 1-1.414 1.414L17 18.414A1 1 0 0 1 17 17M6 6a1 1 0 0 1 1.414 0l1.414 1.414a1 1 0 1 1-1.414 1.414L6 7.414A1 1 0 0 1 6 6m7 12.5a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1m0-15a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1M19.828 6a1 1 0 0 1 0 1.414l-1.414 1.414A1 1 0 1 1 17 7.414L18.414 6a1 1 0 0 1 1.414 0m-11 12.414l-1.414 1.414A1 1 0 1 1 6 18.414L7.414 17a1 1 0 0 1 1.414 1.414"/></g></mask></defs><circle cx="13" cy="13" r="13" fill="currentColor" mask="url(#pepiconsPopSunCircleFilled0)"/></g>
                                </svg>
                            </button>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-neutral" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
