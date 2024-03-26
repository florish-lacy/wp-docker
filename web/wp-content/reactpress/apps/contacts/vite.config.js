import react from '@vitejs/plugin-react';
import { defineConfig } from 'vite';
import svgr from "vite-plugin-svgr";

// https://vitejs.dev/config/
export default defineConfig(({ command }) => {
  if (command === 'build') {
    return {
      base: "/wp-content/reactpress/apps/contacts/dist/",
      plugins: [svgr(), react()],
    }
  } else {
    return {
      plugins: [svgr(), react()],
    }
  }
})
