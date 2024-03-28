import { defineConfig } from 'vite';

export default defineConfig({
	build: {
		target: ['es2015', 'chrome58', 'safari11'],
		outDir: 'assets/dist', // Output directory
		emptyOutDir: false,
		copyPublicDir: false,
		manifest: true,
		minify: true,
		sourcemap: true,
		rollupOptions: {
			input: {
				main: './assets/js/index.ts', // Entry file where your JS/TS files are imported
				// style: './assets/scss/style.scss', // TODO: CSS COMPILATION IS DISABLED - Vite doesn't support scss sourcemaps, so we use sass to generate style.css in dev
			},
			output: {
				// Remove the file hashes!
				// Todo: Maybe figure out how to load with hashes to prevent caches
				// assetFileNames: '[name][extname]', // Sets style.css
				entryFileNames: '[name].js', // main.js
			},
		},
	},
	// Todo: SCSS sourcemaps don't work, so browsersync reloads on scss changes (instead of HMR)
	css: {
		devSourcemap: true,
		preprocessorOptions: {
			scss: {
				//
			},
		},
	},
});
