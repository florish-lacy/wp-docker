import react from '@vitejs/plugin-react'
import path from 'path'
import { defineConfig } from 'vite'

// https://vitejs.dev/config/
export default defineConfig(({ command }) => {
	const config = {
		plugins: [react()],
		server: {
			port: 5175,
		},

		// ShadCN
		resolve: {
			alias: {
				"@": path.resolve(__dirname, "./src"),
			},
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
