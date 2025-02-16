import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // Pastikan ini sudah ada
import LaravelVitePlugin from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    vue(),
    LaravelVitePlugin({
      input: ['resources/js/app.js', 'resources/css/app.css'],
    }),
  ],
});