let mix = require('laravel-mix');


// Transpile Javascript
// ------------------------------
mix.js([
	// '_source/js/vendor/plugin1.js',
	// '_source/js/vendor/plugin2.js',
	'_source/js/main.js',
], 'assets/js/main.js');

// Extract vendor code into a separate file
// mix.extract(['jquery']);


// Compile CSS
// ------------------------------
mix.sass('_source/scss/main.scss', 'assets/css/', {outputStyle: 'compact'});
mix.sass('_source/scss/print.scss', 'assets/css/', {outputStyle: 'compact'});
mix.options({
	processCssUrls: false,
});


// Enable Browser Sync
// ------------------------------
// mix.browserSync({
// 	proxy: 'localhost/',
// 	files: [
// 		'**/*.html',
// 		'**/*.php',
// 		'assets/js/*.js',
// 		'assets/css/*.css',
// 	],
// });
// mix.disableNotifications();



// ==================================================
// Reference
// ==================================================

// copy sample settings file:
// cp -r node_modules/laravel-mix/setup/webpack.mix.js ./

// documentation:
// https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.ts(src, output); <-- Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
