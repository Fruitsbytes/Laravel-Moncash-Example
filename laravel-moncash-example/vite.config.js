import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/cart-page.scss',
                'resources/css/card.scss',
                'resources/css/header.scss',
                'paginated-results.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
