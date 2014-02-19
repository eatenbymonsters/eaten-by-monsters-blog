module.exports=function(grunt){
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-fontsmith');
  grunt.loadNpmTasks('grunt-autoprefixer');
  
  grunt.initConfig({
    
    font:{//fontsmith task
      all:{
        src:['fonts/raw-icons/*.svg'],
        destCss:'scss/_icons.scss',
        destFonts:'fonts/built/icons.{svg,woff,eot,ttf}',
        fontFamily:'icons',
        cssRouter: function (fontpath) {
          return '' + fontpath;
        }//cssRouter
      }//all
    },//font
    
    autoprefixer: {
      options: {
        browsers:['last 2 versions', 'ie 8', 'ie 9']
        // Task-specific options go here.
      },//options
      dist:{
        files:{
          'style.css': 'root.css'
        }//files
      }//dist
    },//autoprefixer
    
    uglify:{
      my_target:{
        files:{
          'js/script.js':['js/raw/*.js']
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
          cwd: 'img/raw/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'img/build/'
        }]//files
      }//dynamic
    },//imagemin
    
    watch:{
      iconfont:{
        files:['fonts/raw-icons/*.svg'],
        tasks:['font']
      },//iconfont
      styles:{
        files: ['root.css'],
        tasks: ['autoprefixer']
      },//styles
      options:{ livereload:true},
      scripts:{
        files:['js/raw/*.js'],
        tasks:['uglify']
      },//scripts
      sass:{
        files:['scss/*.scss'],
        tasks:['compass:dev']
      },//sass
      php:{
        files: ['*.php']
      },//php
      html:{
        files: ['*.html']
      },//html
      imgmin:{
        files:['img/raw/*'],
        tasks:['imagemin']
      }//imgmin
    }//watch
      
  })//initConfig
  grunt.registerTask('default','watch');
}//exports