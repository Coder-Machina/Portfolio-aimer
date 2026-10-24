import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                // [WHY] Single source of truth for the brand palette — never hardcode hex in views
                cinema: {
                    bg: '#0E0E0E',
                    surface: '#1A1A1A',
                    elevated: '#252525',
                    border: '#2E2E2E',
                    text: '#F5F5F0',
                    muted: '#909090',
                    accent: '#D4A847',
                    'accent-h': '#E8BF5A',
                },
            },
            fontFamily: {
                display: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                // [WHY] Fluid hero size: readable on 360px phones, cinematic on desktop
                hero: ['clamp(2.5rem, 8vw, 6rem)', { lineHeight: '1.05', letterSpacing: '-0.02em' }],
            },
            maxWidth: {
                content: '1280px',
            },
        },
    },

    plugins: [forms],
};
