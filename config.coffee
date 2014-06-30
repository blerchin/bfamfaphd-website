exports.config =
	paths:
		public: './'
	files:
    javascripts:
      joinTo:
        'js/vendor.js': /^app\/vendor/
        'js/dataviz.js': /^app\/dataviz/
        'js/app.js': /^app\/javascripts/
    stylesheets:
      joinTo:
        'css/app.css'

	modules:
		wrapper: false
		definition: false

	plugins:
			autoReload:
					enabled:
							js: on
							css: on
							assets: on

			imageoptimizer:
					path: 'images'
					smushit: no
