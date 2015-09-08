module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		/////////////////// WATCH ///////////////////

		watch: {

			options: {
				livereload: true
			},

			copy:{
				files: ['sources/img/*', 'sources/css/*'],
				tasks: 'copy'
			},

			css: {
				files: ['sources/css/*.css'],
				tasks: ['cssbeautifier', 'cssmin'],
				options: {
					nospawn: true
				}
			},

			js:{
				files: ["sources/js/*.js"],
				tasks: ['uglify']
			},

			livereload: {
				files: ['application/views/**/*.php', 'application/controllers/**/*.php']
			}
		},

		/////////////////// COPY ///////////////////

		copy: {
			main: {
				files: [
					{expand: true, cwd: 'sources/img/', src: ['**'], dest: 'public_html/loja_virtual/img/'}
				]
			}
		},

		/////////////////// COFFEE ///////////////////

		/*coffee: {
			compileJoined: {
				options: {
					join: true
				},
				files: {
					// concat then compile into single file
					'public_html/admin/js/app.js': ['dev/app.coffee', 'dev/controllers.coffee']
				}
			}
		},*/

		/////////////////// JADE ///////////////////

		/*jade: {
			compile: {
				options: {
					pretty: true
				},
				files: {
					"public_html/admin/index.html": "dev/index.jade"
				}
			}
		},*/

		/////////////////// LESS ///////////////////

		/*less: {
			development: {
			 options: {
			 paths: ["dev/less"]
			 },
			 files: {
			 "path/to/result.css": "path/to/source.less"
			 }
			 },
			production: {
				options: {
					paths: ["sources/less"],
					yuicompress: true
				},
				files: {
					"public_html/loja_virtual/css/bootstrap.min.css": "sources/less/bootstrap.less"
				}
			}
		},*/

		/////////////////// NGMIN ///////////////////

//		ngmin: {
//			controllers: {
//				src: ['public_html/loja_virtual/js/controllers.js'],
//				dest: 'public_html/loja_virtual/js/controllers-minsafe.js'
//			},
//			directives: {
//				expand: true,
//				cwd: 'test/src',
//				src: ['directives/**/*.js'],
//				dest: 'test/generated'
//			}
//		},

		/////////////////// CSS BEAUTIFIER ///////////////////

		cssbeautifier : {
			files : ["sources/**/*.css"],
			options : {
				indent: '  ',
				openbrace: 'end-of-line',
				autosemicolon: false
			}
		},

		/////////////////// HTMLMIN ///////////////////

		/*htmlmin: {
			dist: {
				options: {
					removeComments: true,
					collapseWhitespace: true
				},
				files: {
					'app/views/index.php': 'sources/index.php'*//*,
					 'dist/contact.html': 'src/contact.html'*//*
				}
			},
			 dev: {
			 files: {
			 'dist/index.html': 'src/index.html',
			 'dist/contact.html': 'src/contact.html'
			 }
			 }
		},*/

		/////////////////// CSSMIN ///////////////////

		cssmin: {
			combine: {
				files: {
					'public_html/loja_virtual/css/app.css': 'sources/css/app.css',
					'public_html/loja_virtual/css/login.css': 'sources/css/login.css',
					'public_html/loja_virtual/css/reject.css': 'sources/css/jquery.reject.css'
				}
			}
		},

		/////////////////// UGLIFY ///////////////////

		uglify: {
			options: {
				banner: '/* <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			my_target: {
				files: {
					'public_html/loja_virtual/js/app.js': ['sources/js/app.js'],
					'public_html/loja_virtual/js/admin.js': ['sources/js/admin.js'],
					'public_html/loja_virtual/js/$/reject.js': ['sources/js/jquery.reject.js']
				}
			}
		}

		/////////////////// IMAGEMIN ///////////////////

		/*imagemin: {
			dist: {
				options: {
					optimizationLevel: 3
				},
				files: {
					'dist/img.png': 'src/img.png',
					'dist/img.jpg': 'src/img.jpg'
				}
			}
		}*/
	});

	/////////////////// LOADING TASKS ///////////////////

	// grunt.loadNpmTasks('grunt-contrib-coffee');
	// grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-contrib-copy');
//	grunt.loadNpmTasks('grunt-contrib-less');
	// grunt.loadNpmTasks('grunt-ngmin');
	grunt.loadNpmTasks('grunt-cssbeautifier');
//	grunt.loadNpmTasks('grunt-contrib-htmlmin');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	// grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	/////////////////// REGISTER TASKS ///////////////////

	grunt.registerTask('default', ['copy', 'cssbeautifier', 'cssmin', 'uglify', 'watch']);

};