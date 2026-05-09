import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                outfit: ['Outfit', 'sans-serif'],
            },
            colors: {
                primary: '#8b5cf6',
                secondary: '#ec4899',
                accent: '#06b6d4',
                warning: '#f59e0b',
                success: '#10b981',
                error: '#ef4444',
                'bg-dark': '#0f172a',
            }
        },
    },

    plugins: [forms],
};
