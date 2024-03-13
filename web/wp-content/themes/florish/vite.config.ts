import autoprefixer from 'autoprefixer';
import { defineConfig } from 'vite';

export default defineConfig({
	build: {
		outDir: 'assets/dist', // Output directory
		// emptyOutDir: true,
		copyPublicDir: false,
		manifest: true,
		minify: true,
		sourcemap: true,
		rollupOptions: {
			input: {
				main: './assets/js/index.js', // Entry file where your JS/TS files are imported
				// style: './assets/scss/style.scss', // TODO: Vite doesn't support scss sourcemaps, so we use sass to generate style.css
			},
			output: {
				assetFileNames: '[name][extname]',
				entryFileNames: '[name].js',
			},
		},
	},
	css: {
		postcss: {
			plugins: [
				autoprefixer({}), // add options if needed
			],
		},
		devSourcemap: true, // Todo: SCSS sourcemaps don't work, so browsersync reloads on scss changes (instead of HMR)
	},
});
