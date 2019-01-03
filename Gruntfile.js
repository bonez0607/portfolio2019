module.exports = function(grunt) {
  const sass = require('node-sass');
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    pug: {
      compile: {
        options: {
          data: {
            debug: false
          }
        },
        files: {
          'dist/index.html': ['src/index.pug']
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
                'dist/css/main.css': 'src/scss/main.scss'
            }
        }
    },
    watch: {
        css:{
          files: 'src/scss/*.scss',
          tasks: ['sass']
        },
        pug:{
          files: 'src/index.pug',
          tasks: ['pug']
        }
      }
  });


  grunt.registerTask('gpug', ['pug']);
  grunt.registerTask('gsass', ['sass']);


  grunt.registerTask('watch-css', ['watch:css'])
  grunt.registerTask('watch-pug', ['watch:pug'])
  grunt.registerTask('default', ['jshint']);



};
