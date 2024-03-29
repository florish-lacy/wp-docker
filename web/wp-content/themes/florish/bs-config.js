// const { exec } = require('child_process');
/*
 |--------------------------------------------------------------------------
 | Browser-sync config file
 |--------------------------------------------------------------------------
 |
 | For up-to-date information about the options:
 |   http://www.browsersync.io/docs/options/
 |
 | There are more options than you see here, these are just the ones that are
 | set internally. See the website for more info.
 |
 |
 */
module.exports = {
	ui: {
		port: 3001,
	},
	files: [
		'*.php',
		'inc/**/*.php',
		'vendor/**/*.php',
		// 'assets/css/*.css',
		// 'assets/js/*.js',
		'assets/dist/**/*',
		'!assets/dist/**/*.map',
		'!assets/dist/css/style.css',
		// 'components/**/*.php',
		// {
		// 	match: ['components/helpers/**/*.php'],
		// 	fn(event, file) {
		// 		/** Custom event handler */
		// 		// Run an npm script calld "php:build"

		// 		// Run a custom command
		// 		exec('npm run php', function (err, stdout, stderr) {
		// 			if (err) {
		// 				console.error(err);
		// 				return;
		// 			}

		// 			console.log(stdout);

		// 			// // Send a message to the browser
		// 			// bs.notify('PHP files have been compiled');

		// 			// // Reload the browser
		// 			// bs.reload();

		// 			// Log the event
		// 			console.log('PHP files have been compiled');
		// 		});
		// 	},
		// },
	],
	watchEvents: ['change'],
	watch: false,
	ignore: [],
	single: false,
	watchOptions: {
		ignoreInitial: true,
	},
	server: false,
	proxy: 'localhost',
	port: 3000,
	middleware: false,
	serveStatic: [],
	ghostMode: {
		clicks: true,
		scroll: true,
		location: true,
		forms: {
			submit: true,
			inputs: true,
			toggles: true,
		},
	},
	logLevel: 'info',
	logPrefix: 'Browsersync',
	logConnections: false,
	logFileChanges: true,
	logSnippet: true,
	rewriteRules: [],
	open: 'local',
	browser: 'default',
	cors: false,
	xip: false,
	hostnameSuffix: false,
	reloadOnRestart: false,
	notify: true,
	scrollProportionally: true,
	scrollThrottle: 0,
	scrollRestoreTechnique: 'window.name',
	scrollElements: [],
	scrollElementMapping: [],
	reloadDelay: 0,
	reloadDebounce: 500,
	reloadThrottle: 0,
	plugins: [],
	injectChanges: true,
	startPath: null,
	minify: true,
	host: null,
	localOnly: false,
	codeSync: true,
	timestamps: true,
	clientEvents: [
		'scroll',
		'scroll:element',
		'input:text',
		'input:toggles',
		'form:submit',
		'form:reset',
		'click',
	],
	socket: {
		socketIoOptions: {
			log: false,
		},
		socketIoClientConfig: {
			reconnectionAttempts: 50,
		},
		path: '/browser-sync/socket.io',
		clientPath: '/browser-sync',
		namespace: '/browser-sync',
		clients: {
			heartbeatTimeout: 5000,
		},
	},
	tagNames: {
		less: 'link',
		scss: 'link',
		css: 'link',
		jpg: 'img',
		jpeg: 'img',
		png: 'img',
		svg: 'img',
		gif: 'img',
		js: 'script',
	},
	injectNotification: false,
};
