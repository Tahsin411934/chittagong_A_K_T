import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Enable dark mode using the class strategy
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
                prata: ['Prata', 'serif'],
            },
            // Optionally extend colors, spacing, etc. for dark mode
        },
    },

    plugins: [
        require('@tailwindcss/forms'), // Make sure to include forms plugin
        require('daisyui'), // Include DaisyUI for additional components
    ],
};
