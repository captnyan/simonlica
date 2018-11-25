module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },
    uglify: {
      options: {
        sourceMap: true
      },
      my_target: {
        files: {
          'js/output.min.js': ['resources/modernizr.js','resources/jquery.js','resources/placeholder.js','resources/fastclick.js', 'resources/foundation.min.js', 'resources/jquery.cookie.js','resources/owl.carousel.min.js','resources/app.js']
        }
      }
    },
    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      },
      uglify:{
        files: ['resources/modernizr.js','resources/jquery.js','resources/placeholder.js','resources/fastclick.js', 'resources/foundation.min.js', 'resources/jquery.cookie.js','resources/owl.carousel.min.js','resources/app.js'],
        tasks: ['uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.registerTask('build', ['sass']);
  grunt.registerTask('js', ['uglify']);
  grunt.registerTask('default', ['build','uglify','watch']);
}