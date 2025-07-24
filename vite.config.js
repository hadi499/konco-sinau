import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true,      // Buka akses untuk jaringan lokal
        port: 5173,      // Opsional (default 5173)
        hmr: {
            host: '192.168.18.2', // Ganti dengan IP lokal PC kamu
        },
    },
});
