import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // darkMode:  ['class'],
    plugins: [
        require('@tailwindcss/typography'),
        require("daisyui")
    ],
    daisyui: {
        themes: ["winter"], // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
        themeRoot: ":root", // The element that receives theme color CSS variables
      },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    // theme: {
    //     extend: {
    //         fontFamily: {
    //             sans: ['Figtree', ...defaultTheme.fontFamily.sans],
    //         },
    //         colors: {
    //             'custom-red': '#d81159',
    //             'custom-main-background': '#111111',
    //             'custom-black' : '#1c1d20',
    //             'custom-blue' : {
    //                 500 : '#3d52d5',
    //                 600 : '#3445B3'
    //             }
    //         },
    //     },
    // },

    // plugins: [forms],
};
