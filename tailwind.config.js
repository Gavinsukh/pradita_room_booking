import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'green-pea': '#1d6e41',
                'concrete': '#f3f3f3',
                'tango': '#f47f26',
                'summer-green': '#95b8a4',
                'manhattan': '#f2c897',
                'bay-leaf': '#74a48c',
                'apricot': '#ec777d',
                'conch': '#c2d4ca',
                'mandys-pink': '#f2d1bd',
                'beauty-bush': '#ecaeb4',
            },
        },
    },

    plugins: [forms, typography],
};
