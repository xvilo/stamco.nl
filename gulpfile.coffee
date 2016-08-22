del = require 'del'
gulp = require 'gulp'
gutil = require 'gulp-util'
path = require 'path'
notify = require 'gulp-notify'
runSequence = require 'run-sequence'
help = require('gulp-help') gulp, hideEmpty: true


# Task aliases
# ------------------------------------------------------------------------------

gulp.task 'styles', 'Compile Sass.', ['sass']
gulp.task 'scripts', 'Compile Coffeescript and JS.', ['webpack']
gulp.task 'default', 'Compile Sass, Coffeescript, JS, sprites.', (done) -> runSequence ['sprites', 'scripts'], done
gulp.task 'dist', 'Generate, version and minify assets. Dist assets are saved to location specified in gulpfile (paths.dist).', (done) -> runSequence 'default', 'rev', ['compress:css', 'compress:js'], done
gulp.task 'lint', 'Lint Sass and Coffeescript.', ['lint:scss', 'lint:coffee']
gulp.task 'sprites', 'Compile SVG files into sprites.', (done) -> runSequence 'sprites:svg', 'styles', done


# Paths
# ------------------------------------------------------------------------------

paths = {}
paths.root = "#{path.resolve(__dirname)}/"
paths.docroot = "#{paths.root}html/"

# Source media
paths.src = "#{paths.root}src/"
paths.sass = "#{paths.src}sass/"
paths.modules = "#{paths.src}javascripts/"
paths.spritesSrc = "#{paths.src}sprites/"
paths.vendor = "#{paths.src}vendor/"

# Compiled media
paths.css = "#{paths.docroot}media/stylesheets/"
paths.js = "#{paths.docroot}media/javascripts/"
paths.sprites = "#{paths.docroot}media/images/sprites/"
paths.dist = "#{paths.docroot}dist/"


# CSS
# ------------------------------------------------------------------------------

autoprefixer = require 'autoprefixer'
bulkSass = require 'gulp-sass-bulk-import'
calc = require 'postcss-calc'
importOnce = require 'node-sass-import-once'
mqDedupe = require 'postcss-mq-dedupe'
postcss = require 'gulp-postcss'
sass = require 'gulp-sass'
sourcemaps = require 'gulp-sourcemaps'
precision = 10

gulp.task 'sass', ->
  gulp.src "#{paths.sass}**/*.scss"
    .pipe sourcemaps.init()
    .pipe bulkSass()
    .pipe sass
      file: true
      includePaths: [paths.spritesSrc, paths.vendor]
      precision: precision
      importer: importOnce
      importOnce: css: true
    .on 'error', logger.error
    .pipe postcss [
      calc precision: precision
      mqDedupe()
      autoprefixer browsers: [ # https://github.com/ai/browserslist#queries
        'last 2 versions'
        'Firefox ESR'
        'Opera 12.1'
        'Explorer >= 9'
        'Firefox >= 28' # Last FF version w/prefixed box-sizing
      ]
    ]
    .pipe sourcemaps.write()
    .pipe gulp.dest paths.css
    .pipe notify
      title: '✅  SASS'
      message: (file) -> "OK: #{logger.format file.path}"


# Webpack
# ------------------------------------------------------------------------------

webpack = require 'webpack-stream'

gulp.task 'webpack', ->
  task = this
  gulp.src "#{paths.modules}app.coffee"
    .pipe webpack
      devtool: 'inline-source-map'
      watch: !!global.isWatching
      output:
        filename: 'app.js'
        path: paths.js
      resolve:
        root: [
          paths.modules
          paths.vendor
          "#{paths.root}node_modules/"
        ]
        extensions: ['', '.js', '.coffee']
      module:
        loaders: [
          test: /\.coffee$/
          loader: 'coffee-loader'
        ]
      externals: ['jquery': 'window.jQuery']
      plugins: [
        new webpack.webpack.ProvidePlugin
          $: 'jquery'
          jQuery: 'jquery'
          'window.jQuery': 'jquery'
          'window.$': 'jquery'
      ]
      quiet: true
    , null, (error, stats) ->
      error = stats.compilation.errors[0] if stats.hasErrors and not error
      error = stats.compilation.warnings[0] if stats.hasWarnings and not error

      if error
        logger.error.call task, new gutil.PluginError 'Webpack', error.error
      else
        gulp.src('').pipe notify # gulp.src is a hack to get pipes working w/out a real stream
          title: '✅  Webpack'
          message: "OK: #{logger.format stats.compilation.outputOptions.path + stats.compilation.outputOptions.filename}"
    .pipe gulp.dest paths.js


# Sprites
# ------------------------------------------------------------------------------

fs = require 'fs'
glob = require 'glob'
SVGSpriter = require 'svg-sprite'

gulp.task 'sprites:svg', ['clear:sprites'], (done) ->
  glob "#{paths.spritesSrc}*/", (error, dirs) ->
    i = 0
    end = -> done() if ++i is dirs.length

    dirs.forEach (dir) ->
      name = path.basename dir
      spriter = new SVGSpriter
        mode:
          css:
            prefix: "icon--#{name}__%s"
            render: scss: template: "#{paths.spritesSrc}tmpl.scss"
          symbol: example: true

      glob "#{dir}svg/*.svg", (err, svgs) ->
        if svgs.length is 0
          end()
          return

        svgs.forEach (svg) ->
          spriter.add(
            svg,
            path.basename(svg),
            fs.readFileSync svg, encoding: 'utf-8'
          )

        spriter.compile (error, result, data) ->
          fs.writeFileSync "#{paths.sprites + name}.svg", result.symbol.sprite.contents
          fs.writeFileSync "#{dir}sprite.html", result.symbol.example.contents
          fs.writeFileSync "#{dir}_sprite.scss", result.css.scss.contents
          end()

gulp.task 'clear:sprites', (done) -> del ["#{paths.sprites}**/*", "!#{paths.sprites}.gitignore"], done


# Watchers
# ------------------------------------------------------------------------------

chokidar = require 'chokidar'
liveReload = require 'gulp-livereload'

gulp.task 'watch', 'Compile assets on change to source files (Sass, Coffeescript, JS, sprites).', -> runSequence 'sprites', ->
  global.isWatching = true

  watch = (pattern, callback) ->
    chokidar.watch(pattern, ignoreInitial: true).on 'all', (event, path) ->
      logger.log event, gutil.colors.magenta path
      callback event, path

  # Start LiveReload server (requires browser extension: http://livereload.com/extensions/)
  liveReload.listen
    basePath: paths.docroot
    quiet: true

  # Notify LiveReload on file changes in docroot
  watch paths.docroot, (event, path) -> liveReload.changed path

  # Run styles task change on SCSS change
  watch "#{paths.src}**/*.scss", -> runSequence 'styles'

  # Run sprites task change on sprite SVG change
  watch "#{paths.spritesSrc}**/*.svg", -> runSequence 'sprites'

  # Start Webpack in watch mode
  runSequence 'scripts'


# Versioning
# ------------------------------------------------------------------------------

rev = require 'gulp-rev'
revReplace = require 'gulp-rev-replace'

gulp.task 'clear:dist', 'Remove previously generated dist files.', (done) -> del ["#{paths.dist}**/*", "!#{paths.dist}.gitignore"], done

gulp.task 'rev', ['clear:dist'], ->
  gulp.src [
    "#{paths.css}**/*.css"
    "#{paths.js}**/*.js"
  ], base: paths.docroot
  .pipe rev()
  .pipe gulp.dest paths.dist
  .pipe rev.manifest()
  .pipe gulp.dest paths.dist

manifest = gulp.src '#{paths.dist}manifest.json'
  
gulp.task 'revReplace', ->
  gulp.src [
    "*.html"
    "header.php"
    ], base: paths.docroot
    .pipe revReplace([manifest: manifest])

# Compress
# ------------------------------------------------------------------------------

csso = require 'gulp-csso'
uglify = require 'gulp-uglify'

gulp.task 'compress:css', ->
  gulp.src "#{paths.dist}**/*.css"
    .pipe csso()
    .pipe gulp.dest paths.dist

gulp.task 'compress:js', ->
  gulp.src "#{paths.dist}**/*.js"
    .pipe uglify()
    .pipe gulp.dest paths.dist


# Lint
# ------------------------------------------------------------------------------

scsslint = require 'gulp-scss-lint'
coffeelint = require 'gulp-coffeelint'

gulp.task 'lint:scss', ->
  gulp.src "#{paths.sass}**/*.scss"
    .pipe scsslint config: "#{paths.sass}lint.yml"

gulp.task 'lint:coffee', ->
  gulp.src "#{paths.modules}**/*.coffee"
    .pipe coffeelint optFile: "#{paths.modules}lint.json"
    .pipe coffeelint.reporter()


# Logging
# ------------------------------------------------------------------------------

logger =
  log: (parts...) ->
    gutil.log.call null, logger.format.apply null, parts
  format: (parts...) ->
    parts.join(' ').trim().replace paths.root, '', 'g'
  error: (error) ->
    notify.onError
      title: "❌  #{error.plugin}"
      message: logger.format error.message
    .call this, error