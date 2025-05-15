import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
  },
  css: {
    postcss: path.resolve(__dirname, 'postcss.config.js'),
  },
});
