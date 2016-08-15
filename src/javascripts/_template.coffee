options = require './options'

class _Template
  @defaults: {}

  constructor: (@$wrap, settings) ->
    @options = options _Template.defaults, settings

module.exports = _Template
