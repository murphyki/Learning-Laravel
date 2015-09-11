//Gruntfile
module.exports = function (grunt) {

//Initializing the configuration object
  grunt.initConfig({

    // Paths variables
    paths: {
      // Development where put SASS files, etc
      assets: {
        sass: './resources/assets/sass/',
        js: './resources/assets/js/',
        images: './resources/assets/images/',
        vendor: './vendor/bower_components/'
      },
      views: './resources/views/',
      // Production where Grunt output the files
      dist: './public/',
      css: './public/css/',
      images: './public/images/',
      js: './public/js/'
    },

    // Task configuration
    sass: {
      css: {
        options: {
          style: 'compressed',
          compass: true
        },
        files: [
          {
            expand: true,
            cwd: '<%= paths.assets.sass %>',
            src: '**/*.scss',
            dest: '<%= paths.css %>',
            ext: '.css'
          }
        ]
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      js_header: {
        src: [
          '<%= paths.assets.vendor %>modernizr/modernizr.js'
        ],
        dest: '<%= paths.js %>scripts_header.js'
      },
      js_footer: {
        src: [
          '<%= paths.assets.vendor %>jquery/dist/jquery.js',
          '<%= paths.assets.vendor %>bootstrap-sass-official/assets/javascripts/bootstrap.js',
          '<%= paths.assets.js %>app.js'
        ],
        dest: '<%= paths.js %>scripts_footer.js'
      }
    },

    uglify: {
      options: {
        // Grunt can replace variables names, but may not be a good idea for you,
        // I leave this option as false
        mangle: false
      },
      js: {
        // Grunt will search for "**/*.js" when the "minify" task
        // runs and build the appropriate src-dest file mappings then, so you
        // don't need to update the Gruntfile when files are added or removed.
        files: [
          {
            expand: true,
            cwd: '<%= paths.js %>',
            src: '**/*.js',
            dest: '<%= paths.js %>',
            ext: '.min.js'
          }
        ],
      }
    },

    // Renames files for browser caching purposes
    filerev: {
      dist: {
        src: [
          '<%= paths.js %>{,*/}*.js',
          '<%= paths.css %>{,*/}*.css',
          '<%= paths.images %>{,*/}*.*'
        ]
      }
    },

    // Reads HTML for usemin blocks to enable smart builds that automatically
    // concat, minify and revision files. Creates configurations in memory so
    // additional tasks can operate on them
    useminPrepare: {
      options: {
        dest: '<%= paths.dist %>'
      },
      html: '<%= paths.views %>master.blade.php'
    },

    // Performs rewrites based on rev and the useminPrepare configuration
    usemin: {
      options: {
        assetsDirs: [
          '<%= paths.dist %>',
          '<%= paths.images %>',
          '<%= paths.css %>'
        ]
      },
      html: ['<%= paths.views %>welcome.blade.php'],
      css: ['<%= paths.css %>{,*/}*.css']
    },

    // The following *-min tasks produce minified files in the public folder
    imagemin: {
      dist: {
        files: [{
          expand: true,
          cwd: '<%= paths.assets.images %>',
          src: '{,*/}*.{gif,jpeg,jpg,png}',
          dest: '<%= paths.images %>'
        }]
      }
    },

    svgmin: {
      dist: {
        files: [{
          expand: true,
          cwd: '<%= paths.assets.images %>',
          src: '{,*/}*.svg',
          dest: '<%= paths.images %>'
        }]
      }
    },

    watch: {
      scss: {
        files: ['<%= paths.assets.sass %>*.scss'],
        tasks: ['sass'],
        options: {
          livereload: true
        }
      },
      views: {
        files: [
          'resources/views/*.php',
          'resources/views/**/*.php'
        ],
        options: {
          livereload: true
        }
      },
      configFiles: {
        files: ['Gruntfile.js'],
        reload: true
      }
    },

    // Empties folders to start fresh
    clean: {
      dist: {
        files: [{
          dot: true,
          src: [
            '.tmp',
            '<%= paths.css %>/*',
            '<%= paths.js %>/*',
            '<%= paths.images %>/*'
          ]
        }]
      }
    },

    // Copies remaining files to places other tasks can use
    copy: {
      images: {
        files: [{
          expand: true,
          cwd: '<%= paths.assets.images %>',
          src: ['*.jpg'],
          dest: '<%= paths.images %>'
        }]
      },
      views: {
        files: [{
          expand: true,
          cwd: '<%= paths.views %>',
          src: ['master.blade.php'],
          dest: '<%= paths.views %>',
          rename: function (dest, src) {
            return dest + '/welcome.blade.php';
          }
        }]
      }
    },

    // Make sure code styles are up to par and there are no obvious mistakes
    eslint: {
      target: [
        'Gruntfile.js',
        '<%= paths.assets.js %>{,*/}*.js',
        '!<%= paths.assets.vendor %>*'
      ]
    },

    php: {
      dist: {
        options: {
          hostname: 'localhost',
          port: 8888,
          base: 'public',
          open: true,
          keepalive: true,
          silent: true
        }
      }
    },

    test: {
      classes: {
        dir: 'tests/'   //location of the tests
      },
      options: {
        bin: 'vendor/bin/phpunit',
        colors: true
      }
    }
  });

  // Plugin loading
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-svgmin');
  grunt.loadNpmTasks('grunt-usemin');
  grunt.loadNpmTasks('grunt-filerev');
  grunt.loadNpmTasks('grunt-eslint');
  grunt.loadNpmTasks('grunt-phpunit');
  grunt.loadNpmTasks('grunt-php');

  // Task definition
  grunt.registerTask('default', ['eslint', 'test']);

  grunt.registerTask('build', ['clean', 'copy', 'imagemin', 'svgmin', 'concat', 'sass', 'uglify', 'filerev', 'useminPrepare', 'usemin']);

  grunt.registerTask('serve', 'start the server and preview your app', function (target) {

    grunt.task.run([
      'php'
    ]);
  });
};
