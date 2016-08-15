quoteRe = /^["']|["']$/g

class Breakpoint
  @initialize: =>
    sizes = (@unquote @grabContent ':after').split(' ')
    (@[size] = do (size) => do => @at(size)) for size in sizes

  @at: (size) => @grabContent(':before').indexOf(size) != -1

  @unquote: (string) -> string.replace quoteRe, ''

  @grabContent: (pseudoElement) ->
    window.getComputedStyle(document.body, pseudoElement).getPropertyValue('content')

Breakpoint.initialize()

module.exports = Breakpoint
