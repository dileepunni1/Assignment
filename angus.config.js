'use strict';

module.exports = {

    bower: {
        /*  packages - The list of bower endpoints your app will use.

            Each package will be installed using the command 'bower install <package>'
            Remember that you can also use git repo's, local folders, URL's and specify version and/or tags
            Please see http://bower.io/docs/api/#install for more info
        */
        packages: [
                'jquery#~2.1.4',
                'angular#~1.4.7',
                'bootstrap#~3.3.5',
                'angular-bootstrap#~0.14.3',
               
                
        ],
        localFolders: [
            //'src/lib'
            'src/style'
        ],
        /*  filesNeeded - A list of files your app will actually use from the bower packages you installed.

            Once Angus has installed the bower packages needed for your app, you need to define
            which files you will actually need from those packages. This way, Angus can automatically include
            them in your HTML files, generate CSS and do additional (optional) things such as AngularJS template caching.

            Angus will look inside the bower_components folder for these files.
            You can specify `.js`, `.scss`, `.html and `.less` files here.
        */
        filesNeeded: {
            js: [
                    'jquery/dist/jquery.js',
                    'angular/angular.js',
                    'bootstrap/dist/js/bootstrap.js',
                    'angular-bootstrap/ui-bootstrap-tpls.js',
                    
            ],
            css: [
                 'bootstrap/dist/css/bootstrap.css'

            ],

            less: [],

            html: []
        }
    },

    // The port this app will be accessible on.
    // Defaults to 9000
    port: 9001,

    // Which CSS compiler to use. Can be 'none', 'sass' or 'less'.
    // Defaults to 'sass'
    cssCompiler: 'none',

    // Which test runner to use. Can be 'none' or 'karma'.
    // Defaults to 'karma'
    testRunner: 'none',

    // Whether JsHint should check your code for errors.
    // Note that you need a .jshintrc file in your project directory for this to work.
    // See the example apps for a good starting point.
    // Defaults to true
    useJsHint: false,

    // When enabled, Angus will execute a few additional tasks such as html2js, ngconstant and ngmin.
    // Defaults to false
    usesAngularJS: true,
    
    // When enabled,Angus will convert all .properties files into assets folder to JSON format
    // useful when translation files are inserted as standard i18n properties files
    // Defaults to false
    convertI18nProperties: true,
    
    // Replace this string with SVN version (out of svnversion command)+current date when building prod
    replaceWithSvnVersion: '<!-- inject:version -->no version info<!-- endinject -->'

};
