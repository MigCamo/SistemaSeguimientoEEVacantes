import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

/* en caso de no funcionar usar la siguiente: 
export default defineConfig({
    base:"/build",
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/flowbite/dist/flowbite.js',
                'node_modules/flowbite/dist/datepicker.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
    server: {
        https: true,
    }
});
*/

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/flowbite/dist/flowbite.js',
                'node_modules/flowbite/dist/datepicker.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
