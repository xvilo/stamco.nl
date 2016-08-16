# Stamco
Stamco Custom Theme


## Frontend setup

1. Installeer Node als deze nog niet is geinstalleerd
2. Run `npm install`
3. Run `gulp`

### Gulp taken

**Lijst van beschikbare taken:** `gulp help`

### LiveReload (optioneel)

LiveReload is aan wanneer `gulp watch` actief is. Om het te gebruiken moet je [de LiveReload extensie voor je browser](http://livereload.com/extensions/) installeren en activeren voor de relevante pagina(s) (In Chrome moet je eerst op de extensie icon drukken als je een pagina bekijkt.)

### Linting (optioneel)

Doe `bundle install` (maar niet als de [scss_lint](https://github.com/brigade/scss-lint) gem al geïnstalleerd is).

### Updating live/staging

Doe `./update && gulp dist` - dit doet het volgende:
1. Stashes changes (if stashable changes exist)
2. Rebases origin/current branch onto current branch
3. Applies stashed changes (if changes were stashed)
4. Runs default gulp task
5. Versions and minifies CSS/JS

### Genereren van SVG sprites
Voor elke sprite; maak de volgende mappen structuur (vervang _{spritename}_ met een URL-vriendelijke ID, bijvoorbeeld: _ui_ of _logos_):

_./src/sprites/{spritename}/svg/_

In de nested _svg_ map kun je een .svg bestand toevoegen voor elke icon (met URL-vriendelijke bestands namen). Deze moeten voorgeschaald zijn op de grote waarin je ze gaat gebruiken. (Niet super belangrijk omdat ze schaalbaar zijn, maar dit helpt in IE8 omdat ze dan worden vervangen door raster graphics)

Voeg de volgende `@import` regel toe in je Sass: `@import "{spritename}/_sprite.scss";` (Vervang _{spritenaam}_ zoals hierboven)

Doe `gulp sprites && gulp sass`. Dit genereert de SVG sprites + maakt een html reference bestand: _./src/sprites/{spritename}/svg/sprite.html_ (kan handig zijn als je een overview van icons wilt zien)

Als je op een later moment _.svg_ files toevoegt, doe dan nogmaals `gulp sprites && gulp sass`

## Backend setup

### Config
Doe eerst een `composer install` om alle PHP dependencies te installeren, vervolgens

hernoem je `config-sample.php` naar `config.php` en vul de database gegevens in. 

Upload `db.sql` naar je database server en je bent good-to-go!
