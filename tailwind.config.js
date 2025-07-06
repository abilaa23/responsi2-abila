import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    
    safelist: [
        'border-red-500',
        'text-red-500',
        'ring-red-500',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                lilac: {
                    100: '#f5f3ff',
                    200: '#e6e0ff',
                    300: '#d5caff',
                    400: '#bbaeff',
                    500: '#a28fff',
                    600: '#8f7bff',
                    700: '#7763e6',
                    800: '#5e4bbf',
                },
            },
        },
    },

    plugins: [forms],
};
