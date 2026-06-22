import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            colors: {
                brand: {
                    50: '#f0f4ff',
                    100: '#dde6ff',
                    500: '#4f6ef7',
                    600: '#3b57e8',
                    700: '#2c42c7',
                    900: '#1a2660'
                },
                ink: '#0f172a',
            },
            fontFamily: {
                sans: ['"DM Sans"', ...defaultTheme.fontFamily.sans],
                display: ['"Syne"', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
