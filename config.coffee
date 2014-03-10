exports.config =
	paths:
		public: './'
	files:
    javascripts:
      joinTo:
        'js/vendor.js': /^(vendor|bower_components)/
        'js/app.js': /^app/
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
