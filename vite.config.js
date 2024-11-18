import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/js/navbar.js',
                'resources/css/navbar.css',
                'resources/js/sidebar.js',
                'resources/css/sidebar.css',
                'resources/js/initial.js',
                'resources/css/initial.css',
                'resources/js/second.js',
                'resources/css/second.css',
                'resources/js/third.js',
                'resources/css/third.css',
                'resources/js/job.js',
                'resources/css/job.css',
                'resources/js/joblist.js',
                'resources/css/joblist.css',
            ],
            refresh: true,
        }),
    ],
  
});
