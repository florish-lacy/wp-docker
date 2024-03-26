import react from '@vitejs/plugin-react'
import path from 'path'
import { defineConfig } from 'vite'

// https://vitejs.dev/config/
export default defineConfig(({ command }) => {
	const config = {
		server: {
			port: 5174,
		},
		plugins: [react()],
		resolve: {
			alias: {
			"@": path.resolve(__dirname, "./src"),
			},
		},
	}

	if (command === 'build') {
		return {
			...config,
			base: "/wp-content/reactpress/apps/go/dist/",
		}
	} else {
		return config
	}
})
