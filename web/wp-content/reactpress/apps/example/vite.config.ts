import react from '@vitejs/plugin-react'
import { defineConfig } from 'vite'

// https://vitejs.dev/config/
export default defineConfig(({ command }) => {
	const config = {
		plugins: [react()],
		server: {
			port: 5175,
		},
	}

	if (command === 'build') {
		return {
			...config,
			base: "/wp-content/reactpress/apps/example/dist/",
		}
	} else {
		return config
	}
})
