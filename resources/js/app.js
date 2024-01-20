import './bootstrap';
import '../css/app.css';
import 'vue-select/dist/vue-select.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from "vue3-apexcharts";
import VueSelect from "vue-select";
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


if (window.localStorage.theme === 'dark' || (!('theme' in window.localStorage) || window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    // window.localStorage.theme = 'dark'
    // document.documentElement.classList.add('dark')
} else {
    // window.localStorage.theme = 'light'
    // document.documentElement.classList.remove('dark')
}
  
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('v-select', VueSelect)
            .use(VueApexCharts)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
