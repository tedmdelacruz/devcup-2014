/*global module:false*/
module.exports = function(grunt) {
 // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      js: {
        src: [
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'bower_components/Bootflat/bootflat/js/icheck.min.js',
            'bower_components/Bootflat/bootflat/js/jquery.fs.selecter.min.js',
            'bower_components/Bootflat/bootflat/js/jquery.fs.stepper.min.js',
            'bower_components/angular/angular.min.js',
            'js/app.js'
        ],
        dest: 'public/js/scripts.js'
      },
      css: {
        src: [
            'bower_components/bootstrap/dist/css/bootstrap.min.css',
            'bower_components/Bootflat/bootflat/css/bootflat.min.css',
            'bower_components/fontawesome/css/font-awesome.min.css',
            'css/styles.css'
        ],
        dest: 'public/css/styles.css'
      }
    },
    copy: {
        main: {
            files: [
                {
                    expand: true,
                    flatten: true,
                    filter: 'isFile',
                    src: [
                        'bower_components/fontawesome/fonts/fontawesome-webfont.ttf',
                        'bower_components/fontawesome/fonts/fontawesome-webfont.svg',
                        'bower_components/fontawesome/fonts/fontawesome-webfont.woff',
                        'bower_components/fontawesome/fonts/FontAwesome.otf',
                        'bower_components/fontawesome/fonts/fontawesome-webfont.eot'
                    ],
                    dest: 'public/fonts/'
                },
                {
                    expand: true,
                    flatten: true,
                    filter: 'isFile',
                    src: ['bower_components/Bootflat/bootflat/img/check_flat/default.png'],
                    dest: 'public/img/check_flat/'
                }
            ]
        }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: '<%= concat.js.dest %>',
        dest: 'public/js/scripts.min.js'
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        }
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      lib_test: {
        src: ['lib/**/*.js', 'test/**/*.js']
      }
    },
    sass: {
      dist: {
          options: {
            style: 'expanded'
          },
          files: {
              'css/styles.css': 'scss/styles.scss'
          }
      }
    },
    watch: {
      sass: {
        options: { livereload: true },
        files: ['scss/**/*.scss'],
        tasks: ['sass', 'concat', 'copy']
      },
      livereload: {
        options: { livereload: true },
        files: [
          'app/views/**/*.php',
          'app/controllers/**/*.php',
          'js/**/*'
        ]
      },
      gruntfile: {
        files: '<%= jshint.gruntfile.src %>',
        tasks: ['jshint:gruntfile']
      },
      lib_test: {
        files: '<%= jshint.lib_test.src %>',
        tasks: ['jshint:lib_test']
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Default task.
  grunt.registerTask('default', ['sass', 'jshint', 'concat', 'copy', 'uglify']);

};

