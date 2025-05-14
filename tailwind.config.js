import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
  ],
};

