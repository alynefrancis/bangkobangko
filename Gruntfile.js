module.exports = function(grunt) {

 // Project configuration.
 grunt.initConfig({
   pkg: grunt.file.readJSON('package.json'),
   sass: {
      dist: {    
        options: {
            style: 'nested'
        },
        files: {
          'style.css' : 'scss/style.scss'
        }
      }
    },
     autoprefixer: {
      options: {
        browsers: ['last 5 versions', 'ie 7', 'ie 8', 'ie 9'],
        map: true
      },
      no_dest: {
        src: 'style.css'
      }

    },

    // jshint: {
    //   files: ['Gruntfile.js', 'js/*.js'],
    //   options: {
    //     globals: {
    //       jQuery: true
    //     }
    //   }
    // },
    // imagemin: {
    //     dynamic: {
    //         files: [{
    //             expand: true,
    //             cwd: 'img/',
    //             src: ['**/*.{png,jpg,gif}'],
    //             dest: 'img/build/'
    //         }]
    //     }
    // },
    // concat: {   
    //     dist: {
    //         src: [
    //             'js//*.js', // All JS in the JS folder
    //             'js/app.js'  // This specific file - which is our js file
    //         ],
    //         dest: 'js/build/production.js', // load up production.js into index.html
    //     }
    // },
    // uglify: {
    //     build: {
    //         src: 'js/build/production.js',
    //         dest: 'js/build/production.min.js'
    //     }
    // },
   
    watch: {
      css: {
        files: ['**/*.scss'], 
        // '<%= jshint.files %>','js/*.js'
        tasks: ['sass', 'autoprefixer']
        // , 'jshint', 'concat', 'uglify'
      },
      options: {
        livereload: true,
        spawn: false 
      }
    }, 
    // browserSync: {
    //     dev: {
    //         bsFiles: {
    //             src : [
    //                 'css/app.css','*.html'
    //             ]
    //         },
    //         options: {
    //             watchTask: true,
    //             server: ''
    //         }
    //     }
    // },

    connect: {
      server: {
        options: {
          port: 9001,
          base:''
        }
      }
    }
  
 });
// closes grunt initConfig
 
//snippet I found for postCSS 
//comment: postcss with autoprefixer-core instead of grunt-autoprefixer, which has been deprecated in favour of grunt-postcss 
// postcss: {
//     options: {
//         processors: require('autoprefixer-core')({browsers: 'last 2 versions'}),
//     },
//     dist: {
//         src: 'css/*.css',
//     },
// },

 grunt.loadNpmTasks('grunt-contrib-sass');
 grunt.loadNpmTasks('grunt-contrib-watch');
 grunt.loadNpmTasks('grunt-autoprefixer');
 //grunt.loadNpmTasks('grunt-browser-sync');
 grunt.loadNpmTasks('grunt-contrib-connect');
 // grunt.loadNpmTasks('grunt-contrib-concat');
 // grunt.loadNpmTasks('grunt-contrib-jshint');
 //grunt.loadNpmTasks('grunt-contrib-imagemin');
 // grunt.loadNpmTasks('grunt-contrib-uglify');


// grunt connect (or more verbosely, grunt connect:server) will start a static web server at http://localhost:9001/, with its base path set to the www-root directory relative to the gruntfile, and any tasks run afterwards will be able to access it.



 // Default task(s).
 grunt.registerTask('default', ['sass', 'connect', 'autoprefixer',  'watch']);
};
// 'concat', 'jshint', 'uglify', 
// on the grunt website it says there is 'sass' in the square brackets above 

 // "grunt-browser-sync": "^2.1.3",
    // "grunt-contrib-concat": "^0.5.1",
    // "grunt-contrib-jshint": "^0.11.2",
    // "grunt-contrib-uglify": "^0.9.1",