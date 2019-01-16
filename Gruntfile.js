module.exports = function(grunt) {
  const sass = require('node-sass');
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    imagemin: {
      png: {
        options: {
          optimizationLevel: 7
        },
        files: [
          {
            // Set to true to enable the following options…
            expand: true,
            // cwd is 'current working directory'
            cwd: './dist/assets/',
            src: ['**/*.png'],
            // Could also match cwd line above. i.e. project-directory/img/
            dest: './assets/',
            ext: '.png'
          }
        ]
      },
      jpg: {
        options: {
          progressive: true
        },
        files: [
          {
            // Set to true to enable the following options…
            expand: true,
            // cwd is 'current working directory'
            cwd: './dist/assets/',
            src: ['**/*.jpg'],
            // Could also match cwd. i.e. project-directory/img/
            dest: '.dist/assets/',
            ext: '.jpg'
          }
        ]
      }
    },
    image_resize: {
          options: {
            width: '50%',
            quality: 1,
            overwrite: true
          },
          files: [{
            expand: true,
            src: ['./dist/assets/photo/*.{gif,jpeg,jpg,png}'],
            dest: './dist/assets/compressed/',
          }]
    },
    pug: {
      compile: {
        options: {
          data: {
            debug: false
          },
          localeExtension: true,
          pretty: true
        },
        files: [ {
                          cwd: "./src",
                          src: "**/*.pug",
                          dest: "./dist",
                          expand: true,
                          ext: ".html"
                        } ]
      }
    },
    sass: {
        options: {
            implementation: sass,
            sourceMap: true
        },
        dist: {
            files: {
                'dist/css/main.css': 'src/scss/main.scss',
                'dist/mobile/css/main.css': 'src/scss/mobile/main.scss'

            }
        }
    },

    sasslint: {
        sasslint: {
        options: {
            configFile: 'config/.sass-lint.yml',
            formatter: 'junit',
            outputFile: 'report.xml'
        },
        target: ['src/scss/**/*.scss']
      }
    },
    watch: {
        css:{
          files: 'src/scss/**/*.scss', 
          tasks: ['sass']
        },
        pug:{
          files: ['src/**/*.pug'],
          tasks: ['pug']
        }
      },

  });


  grunt.registerTask('gpug', ['pug']);
  grunt.registerTask('gsass', ['sass']);
  grunt.registerTask('gimagemin', ['imagemin']);
  grunt.registerTask('gimage_resize', ['image_resize']);
  grunt.registerTask('sass-lint', ['sasslint'])


  grunt.registerTask('watch-css', ['watch:css'])
  grunt.registerTask('watch-pug', ['watch:pug'])
  grunt.registerTask('default', ['jshint']);



};
