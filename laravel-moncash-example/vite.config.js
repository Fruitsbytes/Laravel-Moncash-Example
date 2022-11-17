import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/cart-page.scss',
                'resources/css/button.scss',
                'resources/css/card.scss',
                'resources/css/header.scss',
                'resources/css/paginated-results.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ], resolve: {
        alias: {
            '~laravel-echo': path.resolve(__dirname, 'node_modules/laravel-echo'),
            '~pusher-js': path.resolve(__dirname, 'node_modules/pusher-js'),
        }
    },
});
