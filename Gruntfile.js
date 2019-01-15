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
        files: {
          
            'dist/index.html': ['src/index.pug'],
            'dist/about.html': ['src/about.pug'],
            'dist/interactive-map.html': ['src/interactive-map.pug'],
            'dist/webinar-library.html': ['src/webinar-library.pug'],
            'dist/html-email-template.html': ['src/html-email-template.pug'],
            'dist/pollinator-newsletter.html': ['src/pollinator-newsletter.pug'],
            'dist/wildlife-newsletter.html': ['src/wildlife-newsletter.pug'],
            'dist/agroforestry-notes.html': ['src/agroforestry-notes.pug'],
            'dist/about.html': ['src/about.pug'],
          
        }
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


  grunt.registerTask('watch-css', ['watch:css'])
  grunt.registerTask('watch-pug', ['watch:pug'])
  grunt.registerTask('default', ['jshint']);



};
