module.exports=function(grunt){
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.initConfig({
    uglify:{
      my_target:{
        files:{
          'js/script.js':['js/plugins/*.js']
        }//files
      }//my_target
    },//uglify
    compass:{
      dev:{
        options:{
          config:'config.rb'
        }//options
      }//dev
    },//compass
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'images/build/'
        }]//files
      }//dynamic
    },//imagemin
    watch:{
      options:{ livereload:true},
      scripts:{
        files:['js/*.js'],
        tasks:['uglify']
      },//scripts
      sass:{
        files:['scss/*.scss'],
        tasks:['compass:dev']
      },//sass
      php:{
        files: ['*.php']
      }//php
    }//watch  
  })//initConfig
  grunt.registerTask('default','watch');
}//exports