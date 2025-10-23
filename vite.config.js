import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/js/app.js',
                'resources/css/header.css',
                'resources/css/user/home.css',
                'resources/css/admin/landing.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
