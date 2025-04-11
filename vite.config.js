import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0', // Permette l'accesso da altri dispositivi nella rete
        port: 5173, 
        strictPort: true, // Impedisce a Vite di cambiare porta se la 5173 è occupata
        hmr: {
            host: '192.168.9.10', 
            // host: '192.168.1.26', 
        },
    },
});
