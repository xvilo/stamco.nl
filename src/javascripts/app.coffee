FastClick = require 'fastclick/lib/fastclick'
raf = require 'raf'
sectionReady = require './section-ready'

$document = $ document
app = {}

# App entry point
app.setup = ->
  if $.isReady
    app.onDocumentReady()
  else
    $document.on 'ready', app.onDocumentReady

# DOM ready things
app.onDocumentReady = ->
  app.preventFocusStick()
  app.attachFastClick()

  # All other DOM ready things
  sectionReady $document

app.preventFocusStick = ->
  $document.on 'mousedown', 'a, .pseudo-link, .pseudo-link--styled, button, label, input[type="checkbox"], input[type="radio"]', (event) ->
    raf -> $(event.currentTarget).blur()

app.attachFastClick = -> FastClick.attach document.body

app.setup()

$(".menu-icon").on "click", (event) ->
  console.log('click');
  event.preventDefault()
  if $("body").hasClass( "menu-open" )
    $("body").removeClass( "menu-open")
  else
    $("body").addClass( "menu-open")

$("aside").stick_in_parent()

console.log($);